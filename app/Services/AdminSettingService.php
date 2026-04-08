<?php

namespace App\Services;

use App\Models\UserProfile;

class AdminSettingService
{
    public function getData($request)
    {
        $profile = $request->user();
        $profileId = $profile->id;

        $userAdmin = UserProfile::with('user', )
            ->ForUser($profileId)
            ->Admin()
            ->first();
    }
}