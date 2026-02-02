<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SurveySubmission;
use App\Exports\SurveySubmissionA;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\AsesiRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\SurveySubmissionServiceA;
use App\Repositories\SurveySubmissionRepository;

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

    public function index(Request $request, SurveySubmissionServiceA $surveyService)
    {
        $data = $surveyService->getSurveySummaryData();
        $surveySubmissions = $surveyService->getSurveySubmissions($request->input('search'));


        return view('admin.survey-result-a.index', [
            'totalResponses' => $data->totalResponse,
            'countAsesiWithoutSurvey' => $data->countAsesiWithoutSurvey,
            'countAsesiLevelACompleted' => $data->countAsesiLevelACompleted,
            'surveySubmissions' => $surveySubmissions,
            'hideDetailButton' => $surveyService->hideDetailButton(),
            'avgRatings' => $surveyService->getRatingAverage(),
        ]);
    }

    public function show($id)
    {
        $submission = SurveySubmission::with('user.userProfile')->findOrFail($id);
        return view('admin.survey-result-a.show', compact('submission'));
    }

    public function showAsesiWithoutSurvey(SurveySubmissionServiceA $surveyService)
    {
        $data = $surveyService->getAsesiWithoutSurveyA();
        return view('admin.survey-result-a.showAsesiWithoutSurvey', [
            'asesiList' => $data,
        ]);
    }

    public function showQuestions()
    {
        return view('admin.survey-result-a.show_questions');
    }

    public function exportData()
    {   
        $date = now()->format('d-m-Y_H-i-s');
        if(SurveySubmission::count() == 0){
            Alert::info('No data available for export.');
            return redirect()->back()->with('error', 'Tidak ada data untuk diekspor.');
        } else {
            return Excel::download(new SurveySubmissionA(), "survey_submissions_a_{$date}.xlsx");
        }
    }
}