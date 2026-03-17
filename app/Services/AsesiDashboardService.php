<?php

namespace App\Services;

use App\Models\Testimonial;
use App\Repositories\LevelRepository;

class AsesiDashboardService
{
    protected $levelRepo;

    public function __construct(
        LevelRepository $levelRepo
    ) {
        $this->levelRepo = $levelRepo;
    }

    public function getData()
    {
        $levels = $this->levelRepo->getLevels();

        $featuredTestimonials = Testimonial::with(['user', 'category'])
            ->featuredAndApproved()
            ->orderBy('created_at', 'desc')
            ->limit(6) 
            ->get();

        return [
            'levels' => $levels,
            'featuredTestimonials' => $featuredTestimonials];
    }
}
