<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Services\CourseService;

class CourseController extends Controller
{
    protected CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    
    public function index()
    {
        $data = $this->courseService->getMyCourses();

        return view('dashboard.asesi.courses', [
            'courses' => $data['courses'],
            'total'   => $data['total'],
        ]);
    }
}
