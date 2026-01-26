<?php

namespace App\Services;

use App\DTO\SurveySubmissionADTO;
use App\Models\SiteInfo;
use App\Repositories\AsesiRepository;
use App\Repositories\SurveySubmissionRepository;

class SurveySubmissionServiceA
{
    protected $asesiRepo;
    protected $surveyRepo;

    public function __construct(
        AsesiRepository $asesiRepo,
        SurveySubmissionRepository $surveyRepo
    ) {
        $this->asesiRepo = $asesiRepo;
        $this->surveyRepo = $surveyRepo;
    }

    public function getSurveySummaryData()
    {
        // ambil jumlah total asesi sudah mengisi survey
        $totalResponse = $this->surveyRepo->countSurveySubmissions();

        // hitung jumlah total asesi belum mengisi survey        
        $countAsesiWithoutSurvey = $this->asesiRepo->countAsesiWithoutSurveyA();
        
        $countAsesiLevelACompleted = $this->asesiRepo->countAsesiLevelACompleted();

        return new SurveySubmissionADTO(
            $totalResponse,
            $countAsesiWithoutSurvey,
            $countAsesiLevelACompleted,
        );
    }
}