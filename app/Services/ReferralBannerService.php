<?php

namespace App\Services;

use App\Repositories\ReferralBannerRepository;

class ReferralBannerService
{
    protected $repo;
    public function __construct(
        ReferralBannerRepository $repo
    ) {
        $this->repo = $repo;
    }

    public function getBannerData() {
        $banner = $this->repo->getBannerData();
        return $banner;
    }

}