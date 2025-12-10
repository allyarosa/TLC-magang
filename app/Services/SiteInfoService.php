<?php

namespace App\Services;

use App\Models\SiteInfo;

class SiteInfoService
{

    public function updateOrCreate(array $data): SiteInfo
    {
        // Kondisi pencarian array kosong [] memastikan kita selalu menemukan
        // atau membuat baris data yang akan menjadi SiteInfo tunggal.
        return SiteInfo::updateOrCreate(
            [], // Kondisi pencarian (kosong = ambil baris pertama)
            $data // Data untuk diisi/diperbarui
        );
    }

    public function getSiteInfo()
    {
        return SiteInfo::first();
    }
}