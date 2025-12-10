<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use App\Services\ExamMonitoringService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamMonitoringAController extends Controller
{
    protected $service;

    public function __construct(
        ExamMonitoringService $service
        ) {
        $this->service = $service;
    }
    public function index() {

        $data = $this->service->getMonitoringData();
        return view('admin.examMonitoring.index', [
            'userCount' => $data->userCount,
            'asesiRemidialCount' => $data->remidialCount,
            'asesiLulusSemuaCount' => $data->lulusSemuaCount,
        ]);
    }    
}
