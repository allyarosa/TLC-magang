<?php

namespace App\Http\Controllers\Asesi;

use App\Models\Level;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesiDashboardController extends Controller
{
    public function index() {
        $levels = Level::where('id', '!=', 4)->get();
        
        // Ambil testimonial yang sudah di-feature dan disetujui
        $featuredTestimonials = Testimonial::with(['user', 'category'])
            ->where('is_approved', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit(6) // Batasi hanya 6 testimonial untuk dashboard
            ->get();

        return view('dashboard.asesi.dashboard', [
            'levels' => $levels,
            'featuredTestimonials' => $featuredTestimonials
        ]);
    }

    // Method terpisah jika diperlukan untuk API atau AJAX
    public function getFeaturedTestimonials()
    {
        $featuredTestimonials = Testimonial::with(['user', 'category'])
            ->where('is_approved', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return response()->json($featuredTestimonials);
    }
}