<?php
namespace App\Repositories;
use App\Models\User;
use App\Models\ExamA;

class AsesiRepository {
    public function getAsesi() {
        return User::role('asesi')->get();
    }

    public function getAsesiWithPermission() {
        return User::role('asesi')
        ->permission('access_level_A')
        ->get();
    }

    public function getExamA() {
        return ExamA::all();
    }

    public function countRemidialA($passingScore): mixed {
        return ExamA::where('score', '<=', $passingScore) 
        ->distinct('user_id')
        ->count();
    }
}