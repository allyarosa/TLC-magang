<?php

namespace App\Services;

use App\Models\Testimonial;
use App\Repositories\LevelRepository;
use Illuminate\Support\Facades\Auth;

class AsesiDashboardService
{
    protected $levelRepo;

    public function __construct(
        LevelRepository $levelRepo
    ) {
        $this->levelRepo = $levelRepo;
    }

    public function getData()
    {
        $levels = $this->levelRepo->getLevels();
        $user = Auth::user();
        $daysSinceJoined = (int) ceil($user->created_at->floatDiffInDays(now()));
        $percentage = $this->calculateProfileCompletion($user->userProfile);

        $featuredTestimonials = Testimonial::with(['user', 'category'])
            ->featuredAndApproved()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        

        return [
            'levels' => $levels,
            'featuredTestimonials' => $featuredTestimonials,
            'daysSinceJoined' => $daysSinceJoined,
            'profileCompletion' => $percentage,
        ];
    }

    private function calculateProfileCompletion($userProfile)
    {
        $filledFields = 0;
        $totalFields = 14;

        if ($userProfile) {
            $fields = [
                'nama_depan',
                'nik',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'no_wa',
                'latar_belakang_pendidikan',
                'nama_universitas',
                'program_studi',
                'tahun_studi',
                'instansi',
                'profesi',
                'lama_masa_kerja'
            ];
            foreach ($fields as $field) {
                if (!empty($userProfile->$field))
                    $filledFields++;
            }
            if (!empty($userProfile->provinsi) && !empty($userProfile->kabupaten) && !empty($userProfile->kecamatan) && !empty($userProfile->kelurahan)) {
                $filledFields++;
            }
        }

        return round(($filledFields / $totalFields) * 100);
    }
}
