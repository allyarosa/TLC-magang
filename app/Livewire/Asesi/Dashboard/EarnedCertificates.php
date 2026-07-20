<?php

namespace App\Livewire\Asesi\Dashboard;

use App\Models\Certificate;
use App\Models\ExamA;
use App\Models\UserProfile;
use App\Models\SurveySubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EarnedCertificates extends Component
{
    public function mount()
    {
        $this->syncCertificates();
    }

    public function render()
    {
        $user = Auth::user();
        $hasSubmittedSurvey = SurveySubmission::where('user_id', $user->id)->exists();

        $query = Certificate::with('level')
            ->where('user_id', $user->id);

        if ($user && $user->hasPermissionTo('access_level_A')) {
            $query->where('name', 'NOT LIKE', '%Ctk.%');
        }

        $certificates = $query->orderBy('issue_date', 'desc')->get();

        return view('livewire.asesi.dashboard.earned-certificates', [
            'certificates' => $certificates,
            'hasSubmittedSurvey' => $hasSubmittedSurvey,
        ]);
    }

    private function syncCertificates()
    {
        $user = Auth::user();
        if (!$user) return;

        $userProfile = UserProfile::firstWhere('user_id', $user->id);
        $baseName = $userProfile->nama_depan ?? $user->name;
        
        $formatted = $this->formatNamaSertifikat($baseName);
        $baseFormattedName = $formatted['nama'];

        // Retrieve best finished exams for each category
        $completedExams = ExamA::where('user_id', $user->id)
            ->where('status', 'finished')
            ->get()
            ->groupBy('category_a_id')
            ->map(function ($exams) {
                return collect($exams)->sortByDesc('score')->first();
            });

        $examHots = $completedExams->get(1);
        $examPck = $completedExams->get(2);
        $examLiterasi = $completedExams->get(3);
        $examNumerasi = $completedExams->get(4);

        $hasHots = $user->hasPermissionTo('HOTS');
        $hasPck = $user->hasPermissionTo('PCK');
        $hasLiterasi = $user->hasPermissionTo('LITERASI');
        $hasNumerasi = $user->hasPermissionTo('NUMERASI');

        $hotsPassed = $hasHots && $examHots && $examHots->score >= 75;
        $pckPassed = $hasPck && $examPck && $examPck->score >= 75;
        $lnPassed = $hasLiterasi && $hasNumerasi && $examLiterasi && $examLiterasi->score >= 75 && $examNumerasi && $examNumerasi->score >= 75;
        $levelACompleted = $user->hasPermissionTo('level_A_completed');
        $hasAccessLevelA = $user->hasPermissionTo('access_level_A');

        // 1. Level A Main Certificate
        if ($hasAccessLevelA && $levelACompleted) {
            $this->ensureCertificateRecord($user->id, $baseFormattedName . ', CTK', 1);
        }

        // Sub-sertifikat (HOTS, PCK, LN) hanya dibuat untuk user yang BELUM memiliki akses Level A
        if (!$hasAccessLevelA) {
            // 2. HOTS Sub-certificate
            if ($hotsPassed) {
                $this->ensureCertificateRecord($user->id, $baseFormattedName . ', Ctk.HOTS', 1);
            }

            // 3. PCK Sub-certificate
            if ($pckPassed) {
                $this->ensureCertificateRecord($user->id, $baseFormattedName . ', Ctk.PCK', 1);
            }

            // 4. LN Sub-certificate
            if ($lnPassed) {
                $this->ensureCertificateRecord($user->id, $baseFormattedName . ', Ctk.LN', 1);
            }
        }
    }

    private function ensureCertificateRecord($userId, $certificateName, $levelId)
    {
        $certificate = Certificate::where('user_id', $userId)
            ->whereYear('issue_date', now()->year)
            ->where('name', $certificateName)
            ->first();

        if (!$certificate) {
            try {
                DB::beginTransaction();
                
                // Double check to prevent race conditions
                $certificate = Certificate::where('user_id', $userId)
                    ->whereYear('issue_date', now()->year)
                    ->where('name', $certificateName)
                    ->first();

                if (!$certificate) {
                    $certificateNumber = Certificate::generateCertificateNumber();

                    Certificate::create([
                        'user_id' => $userId,
                        'certificate_number' => $certificateNumber,
                        'name' => $certificateName,
                        'issue_date' => now(),
                        'level_id' => $levelId,
                    ]);
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // Safe to ignore or log
            }
        }
    }

    private function formatNamaSertifikat(string $nama): array
    {
        if (mb_strtoupper($nama, 'UTF-8') === $nama) {
            $nama = mb_strtolower($nama, 'UTF-8');
            $parts = explode(',', $nama);
            $parts[0] = mb_convert_case($parts[0], MB_CASE_TITLE, 'UTF-8');
            if (isset($parts[1])) {
                $parts[1] = ucfirst($parts[1]);
            }
            $nama = implode(',', $parts);
        }
        return ['nama' => $nama];
    }
}
