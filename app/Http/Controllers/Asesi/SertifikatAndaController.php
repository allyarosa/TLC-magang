<?php

namespace App\Http\Controllers\Asesi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamA;
use Illuminate\Support\Facades\Auth;

class SertifikatAndaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Mengambil ujian terakhir untuk setiap kategori untuk asesi yang sedang login
        $completedExams = ExamA::where('user_id', $user->id)
            ->get()
            ->groupBy('category_a_id')
            ->map(function ($exams) {
                return collect($exams)->sortByDesc('end_time')->first();
            });
        
        return view('dashboard.asesi.sertifikat-anda', compact('completedExams'));
    }
}
