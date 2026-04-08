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
            'category_id' => 'required|numeric|exists:category_a,id',
        ]);
        
        $category = CategoryA::findOrFail($request->category_id);

        $viewMap = [
            1 => 'HOTS',
            2 => 'PCK',
            3 => 'LITERASI',
            4 => 'NUMERASI',
        ];

        if (!isset($viewMap[$category->id])) {
            Log::warning('Kategori tidak valid diakses', [
                'category_id' => $request->category_id,
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->back();
        }

        $questionCount = QuestionA::where('category_a_id', $category->id)->count();

        return view("user.sertifikasi.levelA.{$viewMap[$category->id]}.instruction", [
            'category' => $category,
            'questionCount' => $questionCount,
        ]);
    }

    public function start(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:category_a,id'
        ]);

        // 1. Validate category exists
        $categoryA = CategoryA::find($validated['category_id']);
        if (!$categoryA) {
            Log::channel('exam')->warning('Category not found', [
                'category_id' => $validated['category_id'],
                'user_id' => Auth::id()
            ]);
            return redirect()->back()->with('error', 'Kategori ujian tidak ditemukan.');
        }

        $timeLimit = (int) $categoryA->time_limit;

        // 2. Check for unfinished exam with pessimistic lock to prevent race condition
        $unfinishedExam = ExamA::where('user_id', Auth::id())
            ->where('category_a_id', $validated['category_id'])
            ->where('status', 'started')
            ->lockForUpdate()
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
            // 3. Create new exam with transaction
            $exam = ExamA::create([
                'user_id' => Auth::id(),
                'category_a_id' => $validated['category_id'],
                'status' => 'started',
                'start_time' => now(),
                'end_time' => now()->addMinutes($timeLimit),
                'is_passed' => false,
            ]);

            Log::channel('exam')->info('New exam started', [
                'id' => $exam->id,
                'user_id' => Auth::id(),
                'category_id' => $validated['category_id'],
                'time_limit' => $timeLimit
            ]);

            // 4. Get random questions for this category
            $questions = QuestionA::where('category_a_id', $validated['category_id'])
                ->inRandomOrder()
                ->limit($categoryA->question_count ?? 30)
                ->get();

            // 5. Validate questions exist
            if ($questions->isEmpty()) {
                Log::channel('exam')->warning('No questions found for category', [
                    'category_id' => $validated['category_id'],
                    'exam_id' => $exam->id
                ]);
                throw new \Exception('Tidak ada soal tersedia untuk kategori ini.');
            }

            // 6. Attach questions to exam
            foreach ($questions as $question) {
                $exam->questionsA()->attach($question->id);
            }

            DB::commit();

            Log::channel('exam')->info('Exam questions attached', [
                'exam_id' => $exam->id,
                'question_count' => $questions->count()
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('exam')->error('Error starting exam', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'category_id' => $validated['category_id'],
                'trace' => $e->getTraceAsString()
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
        Log::info('Exam Data Debug', [
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
                $exam->start_time->addMinutes(60) :
                now()->addMinutes(60);

            $exam->update(['end_time' => $endTime]);
            $exam->refresh();
        }

        // Get category - gunakan logika yang sama seperti di result()
        $categoryId = $exam->category_a_id ?? $exam->category_id;
        $category = CategoryA::find($categoryId);

        Log::info('Category Debug', [
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
            'user_answer' => 'required|in:a,b,c,d,e',
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

        $passing_score = 75;
        if ($category) {
            $passing_score = $category->passing_score ?? 75;
        }

        // Update exam
        $exam->update([
            'status' => 'finished',
            'end_time' => now(),
            'score' => $score,
            'is_passed' => $score >= $passing_score,
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $exam->questionsA()->wherePivot('is_correct', false)->count(),
            'total_questions' => $totalQuestions,
            'unanswered_questions' => $totalQuestions - $exam->questionsA()->wherePivotNotNull('user_answer')->count(),
        ]);

        $exam->user->givePermissionTo($category->name . '_LOCK');

        if ($exam->is_passed && $category) {
            $user = $exam->user;
            event(new ExamCompleted($user, $category));
        }
        Alert::success('success', 'Menyelesaikan ujian');
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

            abort(403, 'Unauthorized access');
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

        // Cek apakah user sudah memberikan testimonial untuk kategori ini
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
}
