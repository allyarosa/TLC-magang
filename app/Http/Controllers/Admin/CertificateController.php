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
                return $exams->sortByDesc('score')->first();
            })
            ->values();

        $backgroundPath = public_path('assets/sertifikat/sertifikat_tlc.png');
        $backgroundImage = base64_encode(file_get_contents($backgroundPath));

        $backgroundPath2 = public_path('assets/sertifikat/sertifikat_tlc2.png');
        $backgroundImage2 = base64_encode(file_get_contents($backgroundPath2));

        $formatted = $this->formatNamaSertifikat($userProfile->nama_depan ?? 'name not found');
        $sertifikatDate = $certificate->created_at ? $certificate->created_at->format('d F Y') : now()->format('d F Y');

        $levels = [
            1 => 'A',
            2 => 'B',
            3 => 'C'
        ];
        $levelName = $levels[$certificate->level_id] ?? null;


        $data = [
            // Page 1
            'name' => $userProfile->nama_depan ?? $user->name,  
            'date' => $sertifikatDate,
            'backgroundImage' => $backgroundImage,
            'fontSize' => $formatted['fontSize'],
            'certificateNumber' => $certificate->certificate_number,

            // Page 2
            'backgroundImage2' => $backgroundImage2,
            'competency1' => 'Pedagogical Content Knowledge (PCK)',
            'competency2' => 'High Order Thinking Skills (HOTS)',
            'competency3' => 'Literasi',
            'competency4' => 'Numerasi',
            'competency5' => 'Jam Pelatihan (JP)',

            // Nilai Teori Page 2
            'theory1' => isset($examsA[0]) ? $this->convertScoreToGrade($examsA[0]->score) : 'Data not available',
            'theory2' => isset($examsA[1]) ? $this->convertScoreToGrade($examsA[1]->score) : 'Data not available',
            'theory3' => isset($examsA[2]) ? $this->convertScoreToGrade($examsA[2]->score) : 'Data not available',
            'theory4' => isset($examsA[3]) ? $this->convertScoreToGrade($examsA[3]->score) : 'Data not available',
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
