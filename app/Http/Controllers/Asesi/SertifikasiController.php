<?php

namespace App\Http\Controllers\Asesi;

use App\Models\User;
use App\Models\ExamA;
use App\Models\Payment;
use App\Models\CategoryA;
use App\Models\QuestionA;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $id = $decoded[0];
        $userProfile = UserProfile::firstWhere('user_id', $id);

        $formatted = $this->formatNamaSertifikat($userProfile->nama_depan ?? 'name not found');

        $examsA = ExamA::where('user_id', $id)
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

        $data = [
            // Page 1
            'name' => $formatted['nama'],
            'date' => now()->format('d F Y'),
            'backgroundImage' => $backgroundImage,
            'fontSize' => $formatted['fontSize'],

            // Page 2
            'backgroundImage2' => $backgroundImage2,
            'competency1' => 'High Order Thinking Skills (HOTS)',
            'competency2' => 'Pedagogical Content Knowledge (PCK)',
            'competency3' => 'Literasi',
            'competency4' => 'Numerasi',
            'competency5' => 'Jam Pelatihan (JP)',

            // Nilai Teori Page 2
            'theory1' => $examsA[0]->score ?? 'Data not available',
            'theory2' => $examsA[1]->score ?? 'Data not available',
            'theory3' => $examsA[2]->score ?? 'Data not available',
            'theory4' => $examsA[3]->score ?? 'Data not available',
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
            $nama = mb_convert_case(strtolower($nama), MB_CASE_TITLE, "UTF-8");
        }

        $defaultFontSize = 200;
        $fontSize = 0;
        $minFontSize = 150;
        $panjangNama = mb_strlen($nama, 'UTF-8');

        if ($panjangNama <= 25) {
            // $fontSize = max($minFontSize, $defaultFontSize - ($panjangNama - 25) * 0.5);
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