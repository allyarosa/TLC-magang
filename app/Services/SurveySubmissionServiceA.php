<?php

namespace App\Services;

use App\Models\SiteInfo;
use App\Models\SurveySubmission;
use App\DTO\SurveySubmissionADTO;
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

    public function getSurveySubmissions($search = null)
    {
        $query = SurveySubmission::with('user.userProfile');
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        return $query->paginate(10)->withQueryString();
    }

    public function getAsesiWithoutSurveyA()
    {
        return $this->asesiRepo->getAsesiWithoutSurveyA();
    }

    public function hideDetailButton()
    {

        if ($this->asesiRepo->countAsesiWithoutSurveyA() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getRatingAverage()
    {
        $averages = SurveySubmission::selectRaw('
        AVG(rating_materi) as avg_materi, 
        AVG(rating_trainer) as avg_trainer, 
        AVG(rating_uji) as avg_uji,
        AVG(rating_peningkatan_kompetensi) as avg_peningkatan_kompetensi,
        AVG(rating_penerapan) as avg_penerapan
    ')->first();
    return $averages;
    }
}