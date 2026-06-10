<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamA;
use App\Models\Certificate;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query dengan search
        $sertifikat = Certificate::with(['user', 'level'])
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('certificate_number', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                        })
                        ->orWhereHas('level', function ($levelQuery) use ($search) {
                            $levelQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

        $counts = Certificate::selectRaw('level_id, COUNT(*) as count')
            ->groupBy('level_id')
            ->pluck('count', 'level_id');

        $sertifikatCountA = $counts[1] ?? 0;
        $sertifikatCountB = $counts[2] ?? 0;
        $sertifikatCountC = $counts[3] ?? 0;
        $sertifikatCount = $counts->sum();

        return view('admin.certificate.index', [
            'sertifikat' => $sertifikat,
            'emptyStateMessage' => $search
                ? 'Tidak ada hasil untuk pencarian "' . $search . '"'
                : 'Data Sertifikat tidak ditemukan.',
            'sertifikatCountA' => $sertifikatCountA,
            'sertifikatCountB' => $sertifikatCountB,
            'sertifikatCountC' => $sertifikatCountC,
            'sertifikatCountAll' => $sertifikatCount,
            'search' => $search, // untuk keep search value di form
        ]);
    }

    public function downloadSertifikat(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        $userProfile = UserProfile::firstWhere('user_id', $certificate->user_id);
        $user = User::find($certificate->user_id);

        $examsA = ExamA::where('user_id', $certificate->user_id)
            ->get()
            ->groupBy('category_a_id')
            ->map(function ($exams) {
                return collect($exams)->sortByDesc('score')->first();
            });

        $formatted = $this->formatNamaSertifikat($userProfile->nama_depan ?? 'name not found');
        $sertifikatDate = $certificate->created_at ? $certificate->created_at->format('d F Y') : now()->format('d F Y');

        $levels = [
            1 => 'A',
            2 => 'B',
            3 => 'C'
        ];
        $levelName = $levels[$certificate->level_id] ?? null;

        $type = null;
        if (str_ends_with($certificate->name, 'Ctk.HOTS')) {
            $type = 'HOTS';
        } elseif (str_ends_with($certificate->name, 'Ctk.PCK')) {
            $type = 'PCK';
        } elseif (str_ends_with($certificate->name, 'Ctk.LN')) {
            $type = 'LN';
        }

        // Tentukan background image berdasarkan tipe sertifikat
        $depanFile = 'LEVEL-A-DEPAN.png';
        $belakangFile = 'LEVEL-A-BELAKANG.png';

        if ($type === 'HOTS') {
            $depanFile = 'HOTS-DEPAN.png';
            $belakangFile = 'HOTS-BELAKANG.png';
        } elseif ($type === 'PCK') {
            $depanFile = 'PCK-DEPAN.png';
            $belakangFile = 'PCK-BELAKANG.png';
        } elseif ($type === 'LN') {
            $depanFile = 'LITNUM-DEPAN.png';
            $belakangFile = 'LITNUM-BELAKANG.png';
        }

        $backgroundPath = public_path('assets/sertifikat/' . $depanFile);
        $backgroundImage = base64_encode(file_get_contents($backgroundPath));

        $backgroundPath2 = public_path('assets/sertifikat/' . $belakangFile);
        $backgroundImage2 = base64_encode(file_get_contents($backgroundPath2));

        $data = [
            // Page 1
            'name' => $certificate->name,  
            'date' => $sertifikatDate,
            'backgroundImage' => $backgroundImage,
            'fontSize' => $formatted['fontSize'],
            'certificateNumber' => $certificate->certificate_number,
            'certificateType' => $type,

            // Page 2
            'backgroundImage2' => $backgroundImage2,
            'competency1' => 'High Order Thinking Skills (HOTS)',
            'competency2' => 'Pedagogical Content Knowledge (PCK)',
            'competency3' => 'Literasi',
            'competency4' => 'Numerasi',
            'competency5' => 'Jam Pelatihan (JP)',

            // Nilai Teori Page 2
            'theory1' => $examsA->has(1) ? $this->convertScoreToGrade($examsA->get(1)->score) : 'Data not available',
            'theory2' => $examsA->has(2) ? $this->convertScoreToGrade($examsA->get(2)->score) : 'Data not available',
            'theory3' => $examsA->has(3) ? $this->convertScoreToGrade($examsA->get(3)->score) : 'Data not available',
            'theory4' => $examsA->has(4) ? $this->convertScoreToGrade($examsA->get(4)->score) : 'Data not available',
            'theory5' => '36',
        ];

        $pdf = Pdf::loadView('sertifikat', $data);

        // Set paper size ke A4 landscape
        $pdf->setPaper('A4', 'landscape');

        $pdf->setOptions([
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'debugKeepTemp' => false,
            'dpi' => 300,
            'defaultFont' => 'Calibri',
            'enable_font_subsetting' => false,
            'isFontSubsettingEnabled' => false,
        ]);

        $filename = 'Sertifikat_TLC_'. $levelName . '_' . str_replace(' ', '_', $data['name']) . '_' . date('Y-m-d') . '.pdf';
        return $pdf->download($filename);
    }

    private function convertScoreToGrade($score): string
    {
        if ($score >= 85 && $score <= 100) {
            return 'A (Sangat Baik)';
        } elseif ($score >= 70 && $score < 85) {
            return 'B (Baik)';
        } elseif ($score >= 55 && $score < 70) {
            return 'C (Cukup)';
        } elseif ($score >= 40 && $score < 55) {
            return 'D (Kurang)';
        } elseif ($score >= 0 && $score < 40) {
            return 'E (Sangat Kurang)';
        }

        return 'Tidak Valid';
    }

    private function formatNamaSertifikat(string $nama): array
    {
        // --- Convert ke Title Case kalau semua huruf besar ---
        if (mb_strtoupper($nama, 'UTF-8') === $nama) {
            // Ubah semua ke lowercase dulu
            $nama = mb_strtolower($nama, 'UTF-8');

            // Pisahkan nama dan gelar berdasarkan koma
            $parts = explode(',', $nama);

            // Title case untuk nama (bagian sebelum koma)
            $parts[0] = mb_convert_case($parts[0], MB_CASE_TITLE, 'UTF-8');

            // Untuk gelar (bagian setelah koma), biarkan huruf pertama kapital saja
            if (isset($parts[1])) {
                $parts[1] = ucfirst($parts[1]);
            }

            // Gabungkan kembali
            $nama = implode(',', $parts);
        }

        $defaultFontSize = 200;
        $fontSize = 0;
        $minFontSize = 150;
        $panjangNama = mb_strlen($nama, 'UTF-8');

        if ($panjangNama <= 25) {
            $fontSize = 200;
        } else if ($panjangNama <= 35) {
            $fontSize = 140;
        } else if ($panjangNama <= 45) {
            $fontSize = 130;
        } else {
            $fontSize = 130;
        }

        return [
            'nama' => $nama,
            'fontSize' => $fontSize,
        ];
    }
}
