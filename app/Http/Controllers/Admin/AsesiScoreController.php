<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesiScoreController extends Controller
{
    public function showLevelA(string $id) {
        $scoreLevelA = ExamA::where('user_id', $id)
        ->orderBy('score', 'desc')
        ->first();
        return view('admin.asesi.score.scoreLevelA');
    }

    public function showLevelB(string $id) {
        return view('admin.asesi.score.scoreLevelB');
    }

    public function showLevelC(string $id) {
        return view('admin.asesi.score.scoreLevelC');
    }
}
