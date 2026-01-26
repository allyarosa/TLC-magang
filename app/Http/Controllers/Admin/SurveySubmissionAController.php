<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AsesiRepository;
use App\Repositories\SurveySubmissionRepository;
use App\Services\SurveySubmissionServiceA;
use Illuminate\Http\Request;
use App\Models\SurveySubmission;
use App\Http\Controllers\Controller;

class SurveySubmissionAController extends Controller
{
    protected $survey;
    protected $asesi;

    public function __construct(
        SurveySubmissionRepository $survey,
        AsesiRepository $asesi
    ) {
        $this->survey = $survey;
        $this->asesi = $asesi;
    }

    public function index(SurveySubmissionServiceA $surveyService)
    {
        $data = $surveyService->getSurveySummaryData();

        return view('admin.survey-result-a.index', [
            'totalResponses' => $data->totalResponse,
            'countAsesiWithoutSurvey' => $data->countAsesiWithoutSurvey,
            'countAsesiLevelACompleted' => $data->countAsesiLevelACompleted,
        ]);
    }
}