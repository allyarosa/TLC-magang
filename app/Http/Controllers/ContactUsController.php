<?php

namespace App\Http\Controllers;

use App\Services\SiteInfoService;

class ContactUsController extends Controller
{
    public function __construct(
        protected SiteInfoService $siteInfoService
    ) {}

    public function index()
    {
        $siteInfo = $this->siteInfoService->getSiteInfo();

        return view('contact-us', [
            'companyName' => null,
            'phoneNumber' => $siteInfo?->whatsapp,
            'email' => $siteInfo?->email,
            'address' => $siteInfo?->address,
            'description' => $siteInfo?->description,
        ]);
    }
}
