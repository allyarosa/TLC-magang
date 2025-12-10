<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteInfoRequest;
use App\Services\SiteInfoService;
use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    protected $siteInfoService;
    public function __construct(SiteInfoService $siteInfoService)
    {
        $this->siteInfoService = $siteInfoService;
    }
    public function index()
    {
        $footer = $this->siteInfoService->getSiteInfo();
        return view('admin.site-info.index', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiteInfoRequest $request)
    {
        $validatedData = $request->validated();

        // 2. Controller memanggil Service untuk melakukan logika bisnis (Upsert).
        $this->siteInfoService->updateOrCreate($validatedData);

        // 3. Controller mengembalikan response.
        return redirect()->back()->with('success', 'Informasi situs berhasil diperbarui.');
    }
}