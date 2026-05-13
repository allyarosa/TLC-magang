<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use App\Services\AsesiDashboardService;

class AsesiDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(AsesiDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $data = $this->dashboardService->getData();
        // dd($data['profileCompletion']);

        return view('dashboard.asesi.dashboard', [
            'levels' => $data['levels'] ?? [],
            'featuredTestimonials' => $data['featuredTestimonials'] ?? [],
            'daysSinceJoined' => $data['daysSinceJoined'] ?? [],
            'profileCompletion' => $data['profileCompletion'] ?? 0,
        ]);
    }

    public function getFeaturedTestimonials()
    {
        $data = $this->dashboardService->getData();

        return response()->json($data['featuredTestimonials']);
    }

    public function comingSoon()
    {
        return view('dashboard.asesi.coming-soon');
    }
}
