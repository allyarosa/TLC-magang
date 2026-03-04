<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamA;
use App\Models\CategoryA;
use App\Models\Payment;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesiScoreController extends Controller
{
    public function paymentHistory(string $id)
    {
        $asesi = UserProfile::findOrFail($id);

        $payments = Payment::where('user_id', $asesi->user_id)
            ->with('level')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.asesi.payment.history', [
            'title' => 'Riwayat Pembayaran - ' . $asesi->name,
            'asesi' => $asesi,
            'payments' => $payments,
        ]);
    }

    public function showLevelA(string $id)
    {
        $asesi = UserProfile::findOrFail($id);

        // Ambil semua kategori Level A
        $categories = CategoryA::all();

        // Ambil semua exam milik user ini
        $exams = ExamA::where('user_id', $asesi->user_id)
            ->where('status', 'finished')
            ->with('categoryA')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil skor terbaik per kategori
        $bestScores = [];
        foreach ($categories as $category) {
            $bestExam = $exams->where('category_a_id', $category->id)
                ->sortByDesc('score')
                ->first();

            $attemptCount = $exams->where('category_a_id', $category->id)->count();

            $bestScores[$category->id] = [
                'category' => $category,
                'best_exam' => $bestExam,
                'attempts' => $attemptCount,
            ];
        }

        // Group semua exam per kategori untuk tabel riwayat
        $examsByCategory = $exams->groupBy('category_a_id');

        return view('admin.asesi.score.scoreLevelA', [
            'title' => 'Nilai Level A - ' . $asesi->name,
            'asesi' => $asesi,
            'categories' => $categories,
            'bestScores' => $bestScores,
            'examsByCategory' => $examsByCategory,
        ]);
    }

    public function showLevelB(string $id)
    {
        return view('admin.asesi.score.scoreLevelB');
    }

    public function showLevelC(string $id)
    {
        return view('admin.asesi.score.scoreLevelC');
    }
}
