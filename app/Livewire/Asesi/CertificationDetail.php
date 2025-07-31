<?php

namespace App\Livewire\Asesi;

use App\Models\ExamA;
use App\Models\LevelBHistory;
use App\Models\LevelBSubmission;
use App\Models\LevelCHistory;
use App\Models\LevelCSubmission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CertificationDetail extends Component
{
    public $level;
    public $submissions = [];
    public $history = [];
    public $exams = [];

    public function mount($level)
    {
        $this->level = $level;
        $user = Auth::user();

        if ($this->level == 'A') {
            $this->exams = ExamA::where('user_id', $user->id)->with('categoryA')->get();
        } elseif ($this->level == 'B') {
            $this->submissions = LevelBSubmission::where('user_id', $user->id)->get();
            $this->history = LevelBHistory::where('user_id', $user->id)->get();
        } elseif ($this->level == 'C') {
            $this->submissions = LevelCSubmission::where('user_id', $user->id)->get();
            $this->history = LevelCHistory::where('user_id', $user->id)->get();
        }
    }

    public function render()
    {
        $view = 'livewire.asesi.certification-detail';
        if ($this->level == 'B') {
            $view = 'livewire.asesi.certification-detail-b';
        } elseif ($this->level == 'C') {
            $view = 'livewire.asesi.certification-detail-c';
        }

        return view($view, [
            'exams' => $this->exams,
            'submissions' => $this->submissions,
            'history' => $this->history,
        ])->extends('layouts.asesiDashboard');
    }
}
