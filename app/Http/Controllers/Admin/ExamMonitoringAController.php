<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamMonitoringAController extends Controller
{
    public function index() {
        $asesi = User::role('asesi')->get();
        $CategoryA = CategoryA::all();
        $examsA = ExamA::all();
        // Count asesi
        $userLevelACount = $asesi->filter(function ($user) {
            return $user->hasPermissionTo('access_level_A');
        })->count();
        // Passing Score
        $passingScore = CategoryA::first();
        $asesiRemidialCount = ExamA::where('score', '<=', $passingScore->passing_score)->distinct('user_id')->count();
        // Lulus Semua Kategori
        $asesiLulusSemuaCount = $asesi->filter(function ($u) {
            return $u->hasPermissionTo('level_A_completed');
        })->count();

        return view('admin.examMonitoring.index', [
            'userCount' => $userLevelACount ?? 0,
            'asesiRemidialCount' => $asesiRemidialCount ?? 0,
            'asesiLulusSemuaCount' => $asesiLulusSemuaCount,
        ]);
    }
}
