<?php

namespace App\Repositories;

use App\Models\ReferralBanner;

class ReferralBannerRepository {
    public function getBannerData() {
        return ReferralBanner::latest()->first();
    }
}