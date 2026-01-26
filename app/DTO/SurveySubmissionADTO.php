<?php
namespace App\DTO;

class SurveySubmissionADTO
{
    public function __construct(
        public int $totalResponse,
        public int $countAsesiWithoutSurvey,
        public int $countAsesiLevelACompleted,
    ) {}
}

