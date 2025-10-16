<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index() {
        $sertifikat = Certificate::all();
        return view('admin.certificate.index', [
            'sertifikat' => $sertifikat,
            'emptyStateMessage' => 'Data Sertifikat tidak ditemukan.',
        ]);
    }
}
