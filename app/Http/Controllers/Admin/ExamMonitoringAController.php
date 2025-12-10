<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use App\Repositories\AsesiRepository;
use App\Services\ExamMonitoringService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamMonitoringAController extends Controller
{
    protected $service;
    protected $asesi;

    public function __construct(
        ExamMonitoringService $service,
        AsesiRepository $asesi
    ) {
        $this->service = $service;
        $this->asesi = $asesi;
    }
    public function index()
    {
        // dd($this->asesi->getAsesiWithPermission());
        
        $data = $this->service->getMonitoringData();
        return view('admin.examMonitoring.index', [
            'userCount' => $data->userCount,
            'asesiRemidialCount' => $data->remidialCount,
            'asesiLulusSemuaCount' => $data->lulusSemuaCount,
            'asesiDataWithPermission' => $data->asesiDataWithPermission,
        ]);
    }
}
