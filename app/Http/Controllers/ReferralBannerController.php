<?php

namespace App\Http\Controllers;

use App\Repositories\ReferralBannerRepository;
use App\Services\ReferralBannerService;
use Illuminate\Http\Request;

class ReferralBannerController extends Controller
{
    protected $service;
    protected $repo;
    public function __construct(
        ReferralBannerService $service,
        ReferralBannerRepository $repo
    ) {
        $this->service = $service;
        $this->repo = $repo;
    }
    public function index()
    {
        $data = $this->repo->getBannerData();
        return view('admin.referralBanner.index');
    }

    public function update(Request $request)
    {

    }
}
