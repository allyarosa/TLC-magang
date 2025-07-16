<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LevelCSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequestC;

class LevelCController extends Controller
{
    public function index()
    {
        return view('admin.level.level-c-index');

    }

    public function instructionEssay()
    {
        return view('user.sertifikasi.levelC.ESSAY.instruction');
    }

    public function instructionVideoUpload()
    {
        return view('user.sertifikasi.levelC.VIDEO.instruction');
    }

    public function instruction(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        if ($validated['category_id'] == 1) {
            return view('user.sertifikasi.levelC.ESSAY.instruction', [
                'user_id' => $validated['user_id'],
            ]);

        } else if ($validated['category_id'] == 2) {
            return view('user.sertifikasi.levelC.VIDEO.instruction', [
                'user_id' => $validated['user_id'],
            ]);
        }
    }

    public function formEssay()
    {
        return view('user.sertifikasi.levelC.ESSAY.form');
    }

    public function formVideoUpload()
    {
        return view('user.sertifikasi.levelC.VIDEO.form');
    }

    public function storeVideoSubmission(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'video_url' => 'required|url',
                'description' => 'required|string|min:10|max:500',
            ]);

            $userId = Auth::id();
            $user = Auth::user();

            // Validate YouTube URL format
            $youtubeRegex = '/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/';
            if (!preg_match($youtubeRegex, $validated['video_url'])) {
                throw new \Exception('URL harus berupa link YouTube yang valid');
            }

            // Create submission record
            $levelC = LevelCSubmission::create([
                'user_id' => $userId,
                'video_url' => $validated['video_url'],
                'description' => $validated['description'],
                'status' => 'pending',
            ]);

            $user->givePermissionTo('VIDEO_UPLOAD');

            DB::commit();

            Alert::success('Video pembelajaran berhasil dikirim. Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('level_c')->error('Failed to store Level C video submission', [
                'user_id' => $userId ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengirim video pembelajaran: ' . $e->getMessage());
        }
    }

    public function storeSubmission(StoreAssessmentRequestC $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $user = Auth::user();

            // Create submission record
            $levelC = LevelCSubmission::create([
                'user_id' => $user->id,
                'url_video' => $validated['url_video'],
                'description' => $validated['description'],
                'status' => 'pending',
            ]);
            DB::commit();
            $user->givePermissionTo('VIDEO_UPLOAD');

            Alert::success('Berhasil Dikirim', 'Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('level_c')->error('Failed to store Level C submission', [
                'user_id' => $user->id ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Gagal mengirim permohonan sertifikasi Level C: ' . $e->getMessage());
        }
    }
}
