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


    public bool $hasAccessA = false;
    public bool $hasAccessB = false;
    public bool $hasAccessC = false;

    public function mount($level)
    {
        $this->level = $level;
        $user = Auth::user();
        $levelUpper = strtoupper($this->level);

        $this->{'hasAccess' . $levelUpper} = $user->hasPermissionTo('access_level_' . $levelUpper);

        if ($this->level === 'A') {
            $this->exams = ExamA::where('user_id', $user->id)->with('categoryA')->get();
        } else if (in_array($this->level, ['B', 'C'])) {
            $submissionModel = "App\Models\Level{$levelUpper}Submission";
            $historyModel = "App\Models\Level{$levelUpper}History";
            $this->submissions = $submissionModel::where('user_id', $user->id)->get();
            $this->history = $historyModel::where('user_id', $user->id)->get();
        }
    }

    public function render()
    {
        $view = 'livewire.asesi.certification-detail';
        if (in_array($this->level, ['B', 'C'])) {
            $view .= '-' . strtolower($this->level);
        }

        return view($view, [
            'exams' => $this->exams,
            'submissions' => $this->submissions,
            'history' => $this->history,
        ])->extends('layouts.asesiDashboard');
    }
}
