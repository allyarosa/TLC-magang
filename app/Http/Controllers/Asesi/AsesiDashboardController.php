<?php

namespace App\Http\Controllers\Asesi;

use App\Services\AsesiDashboardService;
use App\Http\Controllers\Controller;

class AsesiDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(AsesiDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index() {
        $data = $this->dashboardService->getData();

        return view('dashboard.asesi.dashboard', [
            'levels' => $data['levels'] ?? [],
            'featuredTestimonials' => $data['featuredTestimonials'] ?? []
        ]);
    }

    public function getFeaturedTestimonials()
    {
        $data = $this->dashboardService->getData();
        return response()->json($data['featuredTestimonials']);
    }
}