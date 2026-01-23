<?php

namespace App\Livewire\Asesi;

use Livewire\Component;
use App\Models\SurveySubmission;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SurveyForm extends Component
{
    // Readonly Data from Profile
    public $nama_lengkap;
    public $jenis_kelamin;
    public $jenis_kelamin_label;
    public $lama_pengalaman;
    public $domisili_provinsi;

    // Form Fields
    public $umur_range;
    public $status_pekerjaan;
    public $tempat_bekerja;
    public $tujuan_sertifikasi = [];
    public $tujuan_lainnya;

    // Ratings (1-4)
    public $rating_materi;
    public $rating_trainer;
    public $rating_uji;
    public $rating_peningkatan_kompetensi;
    public $rating_penerapan;

    // Essays
    public $essay_perubahan;
    public $essay_manfaat;
    public $essay_saran;

    // Wizard State
    public $currentStep = 1;
    public $totalSteps = 14;
    // 1: Bio Review, 2: Umur, 3: Job Status, 4: Workplace, 5: Goals
    // 6-10: Ratings (5 pages), 11-13: Essays (3 pages), 14: Finish

    public function mount()
    {
        $user = Auth::user();
        $this->loadProfileData($user);
        $this->loadExistingSubmission($user);
    }

    public function loadProfileData($user)
    {
        $profile = $user->profile;
        if ($profile) {
            $this->nama_lengkap = $user->name;
            $this->jenis_kelamin = $profile->jenis_kelamin;
            $this->jenis_kelamin_label = $profile->jenis_kelamin == 'L' ? 'Laki-laki' : ($profile->jenis_kelamin == 'P' ? 'Perempuan' : '-');
            $this->lama_pengalaman = $profile->lama_masa_kerja;
            $this->domisili_provinsi = $profile->provinsi;
        } else {
            $this->nama_lengkap = $user->name;
        }
    }

    public function loadExistingSubmission($user)
    {
        $submission = SurveySubmission::where('user_id', $user->id)->first();
        if ($submission) {
            $this->umur_range = $submission->umur_range;
            $this->status_pekerjaan = $submission->status_pekerjaan;
            $this->tempat_bekerja = $submission->tempat_bekerja;
            $this->tujuan_sertifikasi = $submission->tujuan_sertifikasi ?? [];
            $this->rating_materi = $submission->rating_materi;
            $this->rating_trainer = $submission->rating_trainer;
            $this->rating_uji = $submission->rating_uji;
            $this->rating_peningkatan_kompetensi = $submission->rating_peningkatan_kompetensi;
            $this->rating_penerapan = $submission->rating_penerapan;
            $this->essay_perubahan = $submission->essay_perubahan;
            $this->essay_manfaat = $submission->essay_manfaat;
            $this->essay_saran = $submission->essay_saran;

            // Determine resume step based on filled data
            if (!$this->umur_range)
                $this->currentStep = 2;
            elseif (!$this->status_pekerjaan)
                $this->currentStep = 3;
            elseif (!$this->tempat_bekerja)
                $this->currentStep = 4;
            elseif (empty($this->tujuan_sertifikasi))
                $this->currentStep = 5;
            elseif (!$this->rating_materi)
                $this->currentStep = 6;
            elseif (!$this->rating_trainer)
                $this->currentStep = 7;
            elseif (!$this->rating_uji)
                $this->currentStep = 8;
            elseif (!$this->rating_peningkatan_kompetensi)
                $this->currentStep = 9;
            elseif (!$this->rating_penerapan)
                $this->currentStep = 10;
            elseif (!$this->essay_perubahan)
                $this->currentStep = 11;
            elseif (!$this->essay_manfaat)
                $this->currentStep = 12;
            elseif (!$this->essay_saran)
                $this->currentStep = 13;
            else
                $this->currentStep = 14;
        }
    }

    protected function rules()
    {
        return $this->getStepValidationRules();
    }

    public function getStepValidationRules()
    {
        return match ($this->currentStep) {
            1 => [], // Info only
            2 => ['umur_range' => 'required|string'],
            3 => ['status_pekerjaan' => 'required|string'],
            4 => ['tempat_bekerja' => 'nullable|string'],
            5 => ['tujuan_sertifikasi' => 'required|array|min:1'],
            6 => ['rating_materi' => 'required|integer|min:1|max:4'],
            7 => ['rating_trainer' => 'required|integer|min:1|max:4'],
            8 => ['rating_uji' => 'required|integer|min:1|max:4'],
            9 => ['rating_peningkatan_kompetensi' => 'required|integer|min:1|max:4'],
            10 => ['rating_penerapan' => 'required|integer|min:1|max:4'],
            11 => ['essay_perubahan' => 'required|string|min:10'],
            12 => ['essay_manfaat' => 'required|string|min:10'],
            13 => ['essay_saran' => 'required|string|min:10'],
            default => []
        };
    }

    public function getCanProceedProperty()
    {
        switch ($this->currentStep) {
            case 1:
                return true;
            case 2:
                return !empty($this->umur_range);
            case 3:
                return !empty($this->status_pekerjaan);
            case 4:
                return true; // Optional
            case 5:
                return !empty($this->tujuan_sertifikasi);
            case 6:
                return !empty($this->rating_materi);
            case 7:
                return !empty($this->rating_trainer);
            case 8:
                return !empty($this->rating_uji);
            case 9:
                return !empty($this->rating_peningkatan_kompetensi);
            case 10:
                return !empty($this->rating_penerapan);
            case 11:
                return !empty($this->essay_perubahan) && strlen($this->essay_perubahan) >= 10;
            case 12:
                return !empty($this->essay_manfaat) && strlen($this->essay_manfaat) >= 10;
            case 13:
                return !empty($this->essay_saran) && strlen($this->essay_saran) >= 10;
            default:
                return true;
        }
    }

    public function nextStep()
    {
        // $this->validate();

        // Handle 'Lainnya' for Tujuan Sertifikasi
        if ($this->currentStep == 5 && $this->tujuan_lainnya && in_array('Lainnya', $this->tujuan_sertifikasi)) {
            // Remove 'Lainnya' placeholder and add actual text if not already present
            $this->tujuan_sertifikasi = array_filter($this->tujuan_sertifikasi, fn($i) => $i !== 'Lainnya');
            $this->tujuan_sertifikasi[] = 'Lainnya: ' . $this->tujuan_lainnya;
        }

        $this->saveProgress();

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function saveProgress()
    {
        SurveySubmission::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'umur_range' => $this->umur_range,
                'status_pekerjaan' => $this->status_pekerjaan,
                'tempat_bekerja' => $this->tempat_bekerja ?? 'belum bekerja',
                'tujuan_sertifikasi' => $this->tujuan_sertifikasi,
                'rating_materi' => $this->rating_materi,
                'rating_trainer' => $this->rating_trainer,
                'rating_uji' => $this->rating_uji,
                'rating_peningkatan_kompetensi' => $this->rating_peningkatan_kompetensi,
                'rating_penerapan' => $this->rating_penerapan,
                'essay_perubahan' => $this->essay_perubahan,
                'essay_manfaat' => $this->essay_manfaat,
                'essay_saran' => $this->essay_saran,
            ]
        );
    }

    public function submit()
    {
        $this->saveProgress();
        $encodedId = Hashids::encode(Auth::id());
        Alert::info('success', 'Sertifikat akan didownload secara otomatis.')
            ->autoClose(3000);
        return redirect()->route('asesi.sertifikasi')
            ->with('download_trigger', route('asesi.downloadCertificate', ['id' => $encodedId]));
    }

    public function render()
    {
        // Calculate progress percentage
        $progress = ($this->currentStep / $this->totalSteps) * 100;

        return view('livewire.asesi.survey-form', [
            'progress' => $progress
        ])->extends('layouts.register');
    }
}
