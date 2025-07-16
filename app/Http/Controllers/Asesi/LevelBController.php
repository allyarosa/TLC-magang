<?php

namespace App\Http\Controllers\Asesi;

use App\Models\User;
use App\Models\CategoryB;
use Exception;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\LevelBSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSubmissionRequest;

class LevelBController extends Controller
{
    public function instructionModulAjar()
    {
        return view('user.sertifikasi.levelB.MODULAJAR.instruction');
    }

    public function instructionPPT()
    {
        return view('user.sertifikasi.levelB.PPT.instruction');
    }

    public function instruction(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        if ($validated['category_id'] == 1) {
            return view('user.sertifikasi.levelB.MODULAJAR.instruction', [
                'user_id' => $validated['user_id'],
            ]);

        } else if ($validated['category_id'] == 2) {
            return view('user.sertifikasi.levelB.PPT.instruction', [
                'user_id' => $validated['user_id'],
            ]);
        }
    }

    public function formPPT()
    {
        return view('user.sertifikasi.levelB.PPT.index');
    }

    public function formModulAjar()
    {
        return view('user.sertifikasi.levelB.MODULAJAR.index');
    }

    public function storeSubmission(StoreSubmissionRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $userId = Auth::id();
            $user = Auth::user();

            $filePptPath = null;
            $modulAjarPath = null;

            // Handle file_ppt upload
            if ($request->hasFile('file_ppt')) {
                $filePpt = $request->file('file_ppt');
                $filePptName = time() . '_ppt_' . $userId . '.' . $filePpt->getClientOriginalExtension();
                $filePptPath = $filePpt->storeAs('level_b/ppt', $filePptName, 'public');
                $user->givePermissionTo('PPT_UPLOAD');
            }

            if ($request->hasFile('modul_ajar')) {
                $modulAjar = $request->file('modul_ajar');
                $modulAjarName = time() . '_modul_' . $userId . '.' . $modulAjar->getClientOriginalExtension();
                $modulAjarPath = $modulAjar->storeAs('level_b/modul_ajar', $modulAjarName, 'public');
                $user->givePermissionTo('MODUL_AJAR');
            }

            // Create submission record
            $levelB = LevelBSubmission::create([
                'user_id' => $userId,
                'file_ppt' => $filePptPath ?? null,
                'modul_ajar' => $modulAjarPath ?? null,
                'description' => $validated['description'],
                'status' => 'pending',
            ]);
            DB::commit();

            Alert::success('Permohonan sertifikasi Level B berhasil dikirim. Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');

        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($filePptPath) && Storage::disk('public')->exists($filePptPath)) {
                Storage::disk('public')->delete($filePptPath);
            }

            if (isset($modulAjarPath) && Storage::disk('public')->exists($modulAjarPath)) {
                Storage::disk('public')->delete($modulAjarPath);
            }

            Log::channel('level_b')->error('Failed to store Level B submission', [
                'user_id' => $userId ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Gagal mengirim permohonan sertifikasi Level B: ' . $e->getMessage());
        }
    }
}
