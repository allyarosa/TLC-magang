<?php

namespace App\Services;

use App\Models\SiteInfo;
use App\Repositories\SurveySubmissionRepository;

class SurveySubmissionService
{
    protected $SurveySubRepo;

    public function __construct(
        SurveySubmissionRepository $SurveySubRepo
    ) {
        $this->SurveySubRepo = $SurveySubRepo;
    }

}