<?php

namespace App\Http\Controllers\Asesi;

use App\Models\QuestionC;
use App\Models\Question_C;
use App\Models\UserAnswerC;
use App\Models\ExamSessionC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamControllerC extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $examSession = ExamSessionC::where('user_id', $user->id)
            ->where('is_completed', false)
            ->first();

        $questions = QuestionC::active()->ordered()->get();
        $totalQuestions = $questions->count();

        if (!$examSession) {
            $examSession = ExamSessionC::create([
                'user_id' => $user->id,
                'started_at' => now(),
            ]);
        }

        $answeredQuestions = UserAnswerC::where('user_id', $user->id)
            ->whereIn('question_id', $questions->pluck('id'))
            ->count();
        // BELUM
        return view('exam.index', compact('examSession', 'totalQuestions', 'answeredQuestions'));
    }

    public function show($questionNumber)
    {
        $user = Auth::user();
        $questions = QuestionC::active()->ordered()->get();

        if ($questionNumber < 1 || $questionNumber > $questions->count()) {
            return redirect()->route('exam.index');
        }

        $question = $questions[$questionNumber - 1];
        $userAnswer = UserAnswerC::where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->first();

        $totalQuestions = $questions->count();
        $currentQuestion = $questionNumber;

        return view('exam.question', compact(
            'question',
            'userAnswer',
            'currentQuestion',
            'totalQuestions'
        ));
    }

    public function store(Request $request, $questionNumber)
    {
        $request->validate([
            'answer' => 'required|string|max:5000',
        ]);

        $user = Auth::user();
        $questions = QuestionC::active()->ordered()->get();

        if ($questionNumber < 1 || $questionNumber > $questions->count()) {
            return redirect()->route('exam.index');
        }

        $question = $questions[$questionNumber - 1];

        UserAnswerC::updateOrCreate(
            [
                'user_id' => $user->id,
                'question_id' => $question->id,
            ],
            [
                'answer' => $request->answer,
                'is_completed' => true,
                'completed_at' => now(),
            ]
        );

        // Check if this is the last question
        if ($questionNumber == $questions->count()) {
            return redirect()->route('exam.summary');
        }

        return redirect()->route('exam.question', $questionNumber + 1);
    }

    public function summary()
    {
        $user = Auth::user();
        $questions = QuestionC::active()->ordered()->get();

        $userAnswers = UserAnswerC::where('user_id', $user->id)
            ->whereIn('question_id', $questions->pluck('id'))
            ->with('question')
            ->get()
            ->keyBy('question_id');

        $totalQuestions = $questions->count();
        $answeredQuestions = $userAnswers->count();

        return view('exam.summary', compact(
            'questions',
            'userAnswers',
            'totalQuestions',
            'answeredQuestions'
        ));
    }

    public function complete()
    {
        $user = Auth::user();

        DB::transaction(function () use ($user) {
            $examSession = ExamSessionC::where('user_id', $user->id)
                ->where('is_completed', false)
                ->first();

            if ($examSession) {
                $examSession->update([
                    'completed_at' => now(),
                    'is_completed' => true,
                ]);
            }
        });

        return redirect()->route('exam.completed');
    }

    public function completed()
    {
        return view('exam.completed');
    }


}
