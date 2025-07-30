<?php

namespace App\Livewire\Asesi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class CertificationDetail extends Component
{
    // public $level;
    // public $levelId;
    // public $certificationData;
    // public $hasAccess = false;
    // public $isCompleted = false;

    // public function mount($level)
    // {
    //     try {
    //         // Decode hashid to get actual level ID
    //         $decodedIds = Hashids::decode($level);
    //         $this->levelId = !empty($decodedIds) ? $decodedIds[0] : null;

    //         if (!$this->levelId) {
    //             abort(404, 'Level tidak ditemukan');
    //         }

    //         $this->level = $this->getLevelName($this->levelId);
    //         $this->loadCertificationData();
    //     } catch (\Exception $e) {
    //         abort(404, 'Level tidak valid');
    //     }
    // }

    // public function loadCertificationData()
    // {
    //     $user = Auth::user();

    //     // Check access permissions based on level
    //     switch ($this->levelId) {
    //         case 1: // Level A
    //             $this->hasAccess = $this->checkLevelAAccess($user);
    //             $this->isCompleted = $user->hasPermissionTo('level_A_completed');
    //             break;
    //         case 2: // Level B
    //             $this->hasAccess = $this->checkLevelBAccess($user);
    //             $this->isCompleted = $user->hasPermissionTo('level_B_completed');
    //             break;
    //         case 3: // Level C
    //             $this->hasAccess = $this->checkLevelCAccess($user);
    //             $this->isCompleted = $user->hasPermissionTo('level_C_completed');
    //             break;
    //     }

    //     // Load certification history/data
    //     $this->certificationData = $this->getCertificationHistory();
    // }

    // private function checkLevelAAccess($user)
    // {
    //     // Check if user has paid for Level A
    //     return $user->payments()->where('level_id', 1)->where('status', 'completed')->exists();
    // }

    // private function checkLevelBAccess($user)
    // {
    //     // Check if Level A is completed and Level B is paid
    //     return $user->hasPermissionTo('level_A_completed') &&
    //         $user->payments()->where('level_id', 2)->where('status', 'completed')->exists();
    // }

    // private function checkLevelCAccess($user)
    // {
    //     // Check if Level B is completed and Level C is paid
    //     return $user->hasPermissionTo('level_B_completed') &&
    //         $user->payments()->where('level_id', 3)->where('status', 'completed')->exists();
    // }

    // private function getLevelName($levelId)
    // {
    //     $levels = [
    //         1 => 'A - Teaching Knowledge',
    //         2 => 'B - Teaching Activation',
    //         3 => 'C - Teaching Mastery'
    //     ];

    //     return $levels[$levelId] ?? 'Unknown Level';
    // }

    // private function getCertificationHistory()
    // {
    //     $user = Auth::user();

    //     // Get certification attempts/history based on level
    //     $history = collect();

    //     if ($this->levelId == 1) {
    //         // Get Level A completion data
    //         $history = $user->assessments()
    //             ->where('level', 'A')
    //             ->with(['submissions', 'evaluations'])
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //     } elseif ($this->levelId == 2) {
    //         // Get Level B completion data
    //         $history = $user->assessments()
    //             ->where('level', 'B')
    //             ->with(['submissions', 'evaluations'])
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //     } elseif ($this->levelId == 3) {
    //         // Get Level C completion data
    //         $history = $user->assessments()
    //             ->where('level', 'C')
    //             ->with(['submissions', 'evaluations'])
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //     }

    //     return $history;
    // }

    // public function downloadCertificate()
    // {
    //     if (!$this->isCompleted) {
    //         session()->flash('error', 'Anda belum menyelesaikan level ini.');
    //         return;
    //     }

    //     // Generate certificate download
    //     return redirect()->route('certificate.download', [
    //         'level' => $this->levelId,
    //         'user' => Hashids::encode(Auth::id())
    //     ]);
    // }

    public function render()
    {
        return view('livewire.asesi.certification-detail')
            ->extends('layouts.app')
            ->section('content');
    }
}
