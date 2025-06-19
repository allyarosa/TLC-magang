<?php

namespace App\Http\Controllers\Asesi;

use Log;
use App\Models\ExamA;
use Barryvdh\DomPDF\PDF;
use App\Models\CategoryA;
use App\Models\QuestionA;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Events\ExamCompleted;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{

    public function instruction(Request $request)
    {
        $request->validate([
            'category_id' => 'required|numeric',
        ]);
        $category = CategoryA::find($request->category_id);

        switch ($request->category_id) {
            case 1:
                return view('user.sertifikasi.levelA.HOTS.instruction', [
                    'category' => $category,
                ]);
            case 2:
                return view('user.sertifikasi.levelA.PCK.instruction', [
                    'category' => $category,
                ]);
            case 3:
                return view('user.sertifikasi.levelA.LITERASI.instruction', [
                    'category' => $category,
                ]);
            case 4:
                return view('user.sertifikasi.levelA.NUMERASI.instruction', [
                    'category' => $category,
                ]);
            default:
                Log::warning('Kategori tidak valid diakses', [
                    'category_id' => $request->category_id,
                    'user_id' => Auth::id(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent()
                ]);
                return redirect()->back();
        }
    }

    public function start(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required'
        ]);

        // Check for unfinished exam
        $unfinishedExam = ExamA::where('user_id', Auth::id())
            ->where('category_a_id', $validated['category_id'])
            ->where('status', 'started')
            ->first();

        if ($unfinishedExam) {
            // Check if exam time has expired
            if ($unfinishedExam->end_time && now()->gt($unfinishedExam->end_time)) {
                // Auto finish expired exam
                $this->autoFinishExpiredExam($unfinishedExam);
                return redirect()->route('asesi.sertifikasi.level.a.result', $unfinishedExam);
            }

            return redirect()->route('asesi.sertifikasi.level.a.show', $unfinishedExam);
        }

        DB::beginTransaction();
        try {
            $exam = ExamA::create([
                'user_id' => Auth::id(),
                'category_a_id' => $validated['category_id'],
                'status' => 'started',
                'start_time' => now(),
                'end_time' => now()->addMinutes(30), // 30 minutes duration
                'is_passed' => false,
            ]);

            Log::channel('exam')->info('New exam started', [
                'id' => $exam->id,
                'user_id' => Auth::id(),
                'category_id' => $validated['category_id']
            ]);

            // Get random questions for this category
            $questions = QuestionA::where('category_a_id', $validated['category_id'])
                ->inRandomOrder()
                ->limit(30)
                ->get();

            // Attach questions to exam
            foreach ($questions as $question) {
                $exam->questionsA()->attach($question->id);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('exam')->error('Error starting exam', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'category_id' => $validated['category_id']
            ]);

            return redirect()->back()->with('error', 'Gagal memulai ujian. Silakan coba lagi.');
        }

        return redirect()->route('asesi.sertifikasi.level.a.show', $exam);
    }

    public function show(ExamA $exam)
    {
        // Ensure the exam belongs to the authenticated user
        if ($exam->user_id != Auth::id()) {
            Log::channel('exam')->warning('Unauthorized exam access attempt', [
                'user_id' => Auth::id(),
                'attempted_exam_id' => $exam->id,
                'exam_owner_id' => $exam->user_id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]);
            abort(403, 'Unauthorized action.');
        }

        // Debug: Log exam data
        \Log::info('Exam Data Debug', [
            'exam_id' => $exam->id,
            'category_a_id' => $exam->category_a_id ?? 'NULL',
            'category_id' => $exam->category_id ?? 'NULL',
            'all_attributes' => $exam->getAttributes()
        ]);

        // Check if exam has expired
        if ($exam->end_time && now()->gt($exam->end_time) && $exam->status === 'started') {
            $this->autoFinishExpiredExam($exam);
            return redirect()->route('asesi.sertifikasi.level.a.result', $exam);
        }

        // If end_time is null, set it to 30 minutes from start_time or now
        if (!$exam->end_time) {
            $endTime = $exam->start_time ?
                $exam->start_time->addMinutes(30) :
                now()->addMinutes(30);

            $exam->update(['end_time' => $endTime]);
            $exam->refresh();
        }

        // Get category - gunakan logika yang sama seperti di result()
        $categoryId = $exam->category_a_id ?? $exam->category_id;
        $category = CategoryA::find($categoryId);

        \Log::info('Category Debug', [
            'category_id_used' => $categoryId,
            'category_found' => $category ? $category->name : 'NULL',
            'category_object' => $category
        ]);

        // Jika kategori tidak ditemukan, buat objek default
        if (!$category) {
            $category = (object) ['name' => 'Kategori Tidak Ditemukan'];
        }

        $questions = $exam->questionsA()->paginate(1);
        $totalQuestions = $exam->questionsA()->count();
        $answeredQuestions = $exam->questionsA()->wherePivotNotNull('user_answer')->count();
        // dd($answeredQuestions);
        // $answeredQuestions = $exam->questionsA()
        //     ->where('category_a_id', 2) 
        //     ->wherePivotNotNull('user_answer')
        //     ->count();



        return view('user.sertifikasi.levelA.exam.show', [
            'exam' => $exam,
            'category' => $category,
            'questions' => $questions,
            'totalQuestions' => $totalQuestions,
            'answeredQuestions' => $answeredQuestions,
            'endTime' => $exam->end_time->toIso8601String(),
        ]);
    }

    public function answer(Request $request, ExamA $exam)
    {
        // Ensure the exam belongs to the authenticated user
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if exam has expired
        if ($exam->end_time && now()->gt($exam->end_time)) {
            $this->autoFinishExpiredExam($exam);
            return redirect()->route('asesi.sertifikasi.level.a.result', $exam);
        }

        $validated = $request->validate([
            'question_a_id' => 'required|exists:questions_a,id',
            'user_answer' => 'required|in:a,b,c,d',
        ]);

        // Get the question
        $question = QuestionA::findOrFail($validated['question_a_id']);

        // Check if the answer is correct
        $isCorrect = $question->correct_answer === $validated['user_answer'];

        // Update the pivot record
        $exam->questionsA()->updateExistingPivot($validated['question_a_id'], [
            'user_answer' => $validated['user_answer'],
            'is_correct' => $isCorrect,
        ]);

        // Redirect to the next question or to the finish page
        if ($request->has('next_question')) {
            return redirect()->route('asesi.sertifikasi.level.a.show', [
                'exam' => $exam,
                'page' => $request->input('next_question'),
            ]);
        }
        return redirect()->route('asesi.sertifikasi.level.a.show', $exam);
    }

    public function finish(ExamA $exam)
    {
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return $this->finishExam($exam);
    }

    private function finishExam(ExamA $exam)
    {
        $category = CategoryA::find($exam->category_a_id);
        $totalQuestions = $exam->questionsA()->count();
        $correctAnswers = $exam->questionsA()->wherePivot('is_correct', true)->count();

        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        // Update exam
        $exam->update([
            'status' => 'finished',
            'end_time' => now(),
            'score' => $score,
            'is_passed' => $score >= ($category->passing_score ?? 70),
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $exam->questionsA()->wherePivot('is_correct', false)->count(),
            'total_questions' => $totalQuestions,
            'unanswered_questions' => $totalQuestions - $exam->questionsA()->wherePivotNotNull('user_answer')->count(),
        ]);

        if ($exam->is_passed) {
            $user = $exam->user;
            event(new ExamCompleted($user, $category));
        }

        return redirect()->route('asesi.sertifikasi.level.a.result', $exam);
    }

    private function autoFinishExpiredExam(ExamA $exam)
    {
        if ($exam->status === 'started') {
            Log::channel('exam')->info('Auto finishing expired exam', [
                'exam_id' => $exam->id,
                'user_id' => $exam->user_id,
                'expired_at' => $exam->end_time
            ]);

            $this->finishExam($exam);
        }
    }

    public function result(ExamA $exam)
    {
        if ($exam->user_id != Auth::id()) {
            Log::channel('exam')->warning('Unauthorized exam result access attempt', [
                'user_id' => Auth::id(),
                'attempted_exam_id' => $exam->id,
                'exam_owner_id' => $exam->user_id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]);
        }

        $totalQuestions = $exam->questionsA()->count();
        $correctAnswers = $exam->questionsA()->wherePivot('is_correct', true)->count();
        $wrongAnswers = $exam->questionsA()->wherePivot('is_correct', false)->count();
        $unansweredQuestions = $totalQuestions - ($correctAnswers + $wrongAnswers);

        // Tentukan nama kolom yang benar
        $categoryId = $exam->category_a_id ?? $exam->category_id;
        $category = CategoryA::find($categoryId);

        // Jika kategori tidak ditemukan, buat objek default
        if (!$category) {
            $category = (object) ['name' => 'Kategori Tidak Ditemukan'];
        }

        if ($exam->is_passed) {
            $user = $exam->user;
            event(new ExamCompleted($user, $category->name));
            Alert::success('Ujian Selesai', 'Selamat, Anda telah lulus ujian pada kategori ' . $category->name);
        } else {
            Alert::error('Ujian Selesai', 'Maaf, Anda belum lulus ujian pada kategori ' . $category->name);
        }
        
        $userHasTestimonial = Testimonial::where('user_id', Auth::id())
        ->where('category_a_id', $categoryId)
        ->exists();

         return view('user.sertifikasi.levelA.exam.result', compact(
            'exam',
            'totalQuestions',
            'correctAnswers',
            'wrongAnswers',
            'unansweredQuestions',
            'category',
            'userHasTestimonial'
        ));
    }

    public function continue()
    {
        return 'ok';
    }
}