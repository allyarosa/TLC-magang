<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer = SiteInfo::first();
        return view('admin.site-info.index', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'youtube' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'description' => 'nullable|string|max:500',
        ]);

        $siteInfo = SiteInfo::first();
        if (!$siteInfo) {
            $siteInfo = new SiteInfo();
        }

        $siteInfo->update($request->all());

        return redirect()->back()->with('success', 'Informasi situs berhasil diperbarui.');
    }
}
