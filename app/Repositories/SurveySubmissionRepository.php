<?php
namespace App\Repositories;
use App\Models\User;
use App\Models\ExamA;
use App\Models\SurveySubmission;

class SurveySubmissionRepository {
    
    public function getSurveySubmissions() {
        return SurveySubmission::all();
    }

    public function countSurveySubmissions(): int {
        return SurveySubmission::count() ?? 0;
    }
}