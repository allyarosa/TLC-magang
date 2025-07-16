<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ExamA;
use App\Models\CategoryA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CountDownTimer extends Component
{
    public $endTime;
    public $examId;
    public $timeExpired = false;

    public function mount($endTime = null, $examId = null)
    {
        $this->endTime = $endTime;
        $this->examId = $examId;
    }

    protected $listeners = ['timeExpired'];

    public function timeExpired()
    {
        if (!$this->timeExpired && $this->examId) {
            $this->timeExpired = true;
            
            Log::channel('exam')->info('Timer expired, auto-finishing exam', [
                'exam_id' => $this->examId,
                'user_id' => Auth::id()
            ]);
            
            // Find the exam and finish it automatically
            $exam = ExamA::where('id', $this->examId)
                         ->where('user_id', Auth::id())
                         ->where('status', 'started')
                         ->first();
            
            if ($exam) {
                $this->finishExpiredExam($exam);
                
                // Redirect to result page
                return redirect()->route('asesi.sertifikasi.level.a.result', $exam);
            }
        }
    }

    private function finishExpiredExam($exam)
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
    }

    public function render()
    {
        return view('livewire.count-down-timer');
    }
}