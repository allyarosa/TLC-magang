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

class SertifikasiController extends Controller
{
    public function index()
    {
        $exams = ExamA::with('user', 'categoryA')
            ->where('user_id', Auth::id())
            ->paginate(10);
        return view('dashboard.asesi.sertifikasi', compact('exams'));
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
        return view('user.sertifikasi.mySertifikasi.sertifikat-b');
    }
    public function sertifikatC(string $id)
    {
        return view('user.sertifikasi.mySertifikasi.sertifikat-c');
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

        $backgroundPath = public_path('assets/sertifikat/sertifikat.jpg');
        $backgroundImage = base64_encode(file_get_contents($backgroundPath));

        $data = [
            'name' => $userProfile->namaDepan,
            'date' => now()->format('d F Y'),
            'backgroundImage' => $backgroundImage,
        ];

        // Generate PDF menggunakan DomPDF
        $pdf = Pdf::loadView('sertifikat', $data);
        // Set paper size dan orientasi
        // $pdf->setPaper('A4', 'landscape');
        $pdf->setPaper([0, 0, 1414, 2000], 'landscape');
        
        $pdf->setOptions([
            'isRemoteEnabled' => false,
            'isPhpEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'debugKeepTemp' => false,
        ]);
        // Set nama file
        $filename = 'Sertifikat_' . str_replace(' ', '_', $data['name']) . '_' . date('Y-m-d') . '.pdf';
        // Download PDF
        return $pdf->download($filename);
    }

    public function dicoding(string $id) {
        return view('');
    }
}
