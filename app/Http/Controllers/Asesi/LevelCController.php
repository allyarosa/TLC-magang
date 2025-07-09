<?php

namespace App\Http\Controllers\Asesi;

use Illuminate\Http\Request;
use App\Models\LevelCSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequestC;

class LevelCController extends Controller
{
    public function storeSubmission(StoreAssessmentRequestC $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $userId = Auth::id();

            // Create submission record
            $levelC = LevelCSubmission::create([
                'user_id' => $userId,
                'url_video' => $validated['url_video'],
                'description' => $validated['description'],
                'status' => 'pending',
            ]);
            DB::commit();

            Alert::success('Permohonan sertifikasi Level C berhasil dikirim. Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('level_c')->error('Failed to store Level C submission', [
                'user_id' => $userId ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Gagal mengirim permohonan sertifikasi Level C: ' . $e->getMessage());
        }
    }
}
