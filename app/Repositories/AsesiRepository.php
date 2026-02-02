<?php
namespace App\Repositories;
use App\Models\User;
use App\Models\ExamA;

class AsesiRepository
{
    public function getAsesi()
    {
        return User::role('asesi')->get();
    }

    public function getAsesiWithPermission()
    {
        return User::role('asesi')
            ->permission('access_level_A')
            ->get();
    }

    public function countAsesiWithoutSurveyA()
    {
        return User::role('asesi')
            ->permission('level_A_completed')
            ->whereDoesntHave('surveyKepuasan')
            ->count();
    }

    public function getAsesiWithoutSurveyA()
    {
        return User::role('asesi')
            ->with('UserProfile')
            ->permission('level_A_completed')
            ->whereDoesntHave('surveyKepuasan')
            ->paginate(10);
    }

    public function countAsesiLevelACompleted() {
        return User::role('asesi')
            ->permission('level_A_completed')
            ->count();
    }

    public function getExamA()
    {
        return ExamA::all();
    }

    public function countRemidialA($passingScore): mixed
    {
        return ExamA::where('score', '<=', $passingScore)
            ->distinct('user_id')
            ->count();
    }
}