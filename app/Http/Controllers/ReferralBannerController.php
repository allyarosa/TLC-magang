<?php

namespace App\Http\Controllers;

use App\Repositories\ReferralBannerRepository;
use App\Services\ReferralBannerService;
use App\Http\Requests\ReferralBannerRequest;
use Illuminate\Http\Request;

class ReferralBannerController extends Controller
{
    protected $service;
    
    public function __construct(ReferralBannerService $service) {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $banners = $this->service->getAllPaginated($request->input('search'));
        return view('admin.referralBanner.index', compact('banners'));
    }

    public function store(ReferralBannerRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.referral-banners.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function update(ReferralBannerRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('admin.referral-banners.index')->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('admin.referral-banners.index')->with('success', 'Banner berhasil dihapus.');
    }

    public function toggleActive($id)
    {
        $this->service->toggleActive($id);
        return redirect()->back()->with('success', 'Status banner berhasil diubah.');
    }
}
