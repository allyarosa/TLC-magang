<?php

namespace App\Http\Controllers\Asesi;

use App\Models\User;
use App\Models\ExamA;
use App\Models\Payment;
use App\Models\CategoryA;
use App\Models\QuestionA;
use App\Models\Certificate;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SertifikasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hasAccessA = $user->hasPermissionTo('access_level_A');
        $hasAccessB = $user->hasPermissionTo('access_level_B');
        $hasAccessC = $user->hasPermissionTo('access_level_C');

        return view('dashboard.asesi.sertifikasi', compact('hasAccessA', 'hasAccessB', 'hasAccessC'));
    }

    public function nilai()
    {
        $exams = ExamA::with(['user', 'categoryA', 'questionsA'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($exam) {
                // Hitung statistik
                $totalQuestions = $exam->questionsA->count();
                $correctAnswers = $exam->questionsA->where('pivot.is_correct', true)->count();
                $wrongAnswers = $exam->questionsA->where('pivot.is_correct', false)->count();
                $unansweredQuestions = $totalQuestions - ($correctAnswers + $wrongAnswers);

                // Tambahkan data yang dihitung
                $exam->total_questions = $totalQuestions;
                $exam->correct_answers = $correctAnswers;
                $exam->wrong_answers = $wrongAnswers;
                $exam->unanswered_questions = $unansweredQuestions;

                return $exam;
            });

        return view('dashboard.asesi.nilai', compact('exams'));
    }

    // public function mySertifikat(string $id) {
    //     return view('user.sertifikasi.mySertifikasi.index');
    // }

    public function sertifikatA(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }
        // userId
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);
        return view('user.sertifikasi.mySertifikasi.sertifikat-a', [
            'namaGelar' => $userProfile->nama_depan,
            'id' => $userProfile->user_id,
        ]);
    }
    public function sertifikatB(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }
        // userId
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);
        return view('user.sertifikasi.mySertifikasi.sertifikat-b', [
            'namaGelar' => $userProfile->nama_depan,
            'id' => $userProfile->user_id,
        ]);
    }
    public function sertifikatC(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }
        // userId
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);
        return view('user.sertifikasi.mySertifikasi.sertifikat-c', [
            'namaGelar' => $userProfile->nama_depan,
            'id' => $userProfile->user_id,
        ]);
    }

    public function downloadCertificate(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        // userId
        $id = (int)$decoded[0];
        $authUser = Auth::user();

        // Security check
        if ($authUser->id !== $id && !$authUser->hasAnyRole(['admin', 'asesor'])) {
            abort(403, 'Akses ditolak');
        }

        // Survey check (kecuali untuk admin/asesor)
        if (!$authUser->hasAnyRole(['admin', 'asesor'])) {
            $hasSubmittedSurvey = \App\Models\SurveySubmission::where('user_id', $id)->exists();
            if (!$hasSubmittedSurvey) {
                abort(403, 'Anda harus mengisi survei terlebih dahulu sebelum dapat mengunduh sertifikat.');
            }
        }

        $userProfile = UserProfile::firstWhere('user_id', $id);
        $user = User::find($id);

        $type = request('type');
        $suffix = '';

        // Pemilik akses Level A tidak diperbolehkan mengunduh sub-sertifikat
        if ($type && $authUser->hasPermissionTo('access_level_A') && !$authUser->hasAnyRole(['admin', 'asesor'])) {
            abort(403, 'Pemilik akses Level A hanya berhak mengunduh Sertifikat Utama.');
        }

        $categoriesMap = \App\Models\CategoryA::all()->keyBy(function ($cat) {
            return strtoupper($cat->name);
        });

        // Query exams completed
        $examsARaw = ExamA::where('user_id', $id)
            ->where('status', 'finished')
            ->get()
            ->groupBy('category_a_id')
            ->map(function ($exams) {
                return collect($exams)->sortByDesc('score')->first();
            });

        $examsA = collect();
        $logicalMapping = [
            'HOTS' => 1,
            'PCK' => 2,
            'LITERASI' => 3,
            'NUMERASI' => 4
        ];

        foreach ($logicalMapping as $name => $logicalId) {
            if (isset($categoriesMap[$name])) {
                $dbId = $categoriesMap[$name]->id;
                if ($examsARaw->has($dbId)) {
                    $examsA->put($logicalId, $examsARaw->get($dbId));
                }
            }
        }

        // Determine permission & suffix based on certificate type
        if ($type === 'HOTS') {
            if (!$authUser->hasPermissionTo('HOTS')) {
                abort(403, 'Anda tidak memiliki akses untuk sub-sertifikat ini.');
            }
            if (!$examsA->has(1) || $examsA->get(1)->score < 75) {
                abort(403, 'Anda belum menyelesaikan ujian HOTS dengan nilai KKM.');
            }
            $suffix = ', Ctk.HOTS';
        } elseif ($type === 'PCK') {
            if (!$authUser->hasPermissionTo('PCK')) {
                abort(403, 'Anda tidak memiliki akses untuk sub-sertifikat ini.');
            }
            if (!$examsA->has(2) || $examsA->get(2)->score < 75) {
                abort(403, 'Anda belum menyelesaikan ujian PCK dengan nilai KKM.');
            }
            $suffix = ', Ctk.PCK';
        } elseif ($type === 'LN') {
            if (!$authUser->hasPermissionTo('LITERASI') || !$authUser->hasPermissionTo('NUMERASI')) {
                abort(403, 'Anda tidak memiliki akses untuk sub-sertifikat ini.');
            }
            $literasiPassed = $examsA->has(3) && $examsA->get(3)->score >= 75;
            $numerasiPassed = $examsA->has(4) && $examsA->get(4)->score >= 75;
            if (!$literasiPassed || !$numerasiPassed) {
                abort(403, 'Anda belum menyelesaikan ujian Literasi dan Numerasi dengan nilai KKM.');
            }
            $suffix = ', Ctk.LN';
        } else {
            // Default to Level A Main Certificate
            if (!$authUser->hasPermissionTo('access_level_A')) {
                abort(403, 'Anda tidak memiliki akses untuk sertifikat Level A.');
            }
            $suffix = ', CTK';
        }

        $baseName = $userProfile->nama_depan ?? $user->name;
        $formatted = $this->formatNamaSertifikat($baseName);
        $certificateName = $formatted['nama'] . $suffix;

        try {
            DB::beginTransaction();

            // Find existing certificate for this user, year, and matching suffix name
            $certificate = Certificate::where('user_id', $id)
                ->whereYear('issue_date', now()->year)
                ->where('name', $certificateName)
                ->first();

            if (!$certificate) {
                $certificateNumber = Certificate::generateCertificateNumber();

                $certificate = Certificate::create([
                    'user_id' => $id,
                    'certificate_number' => $certificateNumber,
                    'name' => $certificateName,
                    'issue_date' => now(),
                    'level_id' => 1,
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, 'Gagal generate nomor sertifikat: ' . $e->getMessage());
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
            'date' => $certificate->issue_date->format('d F Y'),
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

        // Generate PDF menggunakan DomPDF
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

        $filename = 'Sertifikat_TLC_A_' . str_replace(' ', '_', $data['name']) . '_' . date('Y-m-d') . '.pdf';
        return $pdf->download($filename);
    }

    public function previewCertificate(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        // userId
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);

        $backgroundPath = public_path('assets/sertifikat/sertifikat_tlc.png');
        $backgroundImage = base64_encode(file_get_contents($backgroundPath));

        $data = [
            'name' => $userProfile->nama_depan,
            'date' => now()->format('d F Y'),
            'backgroundImage' => $backgroundImage,
        ];

        // Generate PDF
        $pdf = Pdf::loadView('sertifikat', $data);
        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions([
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'debugKeepTemp' => false,
            'dpi' => 300,
            'defaultFont' => 'Arial',
            'enable_font_subsetting' => false,
            'isFontSubsettingEnabled' => false,
        ]);

        return $pdf->stream('Preview_Sertifikat_' . str_replace(' ', '_', $data['name']) . '.pdf');
    }

    // Method untuk preview HTML langsung (tanpa PDF)
    public function previewCertificateHTML(string $id)
    {
        $decoded = Hashids::decode($id);
        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        // userId
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);

        $backgroundPath = public_path('assets/sertifikat/sertifikat_tlc.png');
        $backgroundImage = base64_encode(file_get_contents($backgroundPath));

        $data = [
            'name' => $userProfile->nama_depan,
            'date' => now()->format('d F Y'),
            'backgroundImage' => $backgroundImage,
        ];

        // Return view HTML untuk preview
        return view('sertifikat-preview', $data);
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
}