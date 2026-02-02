<?php

namespace App\Exports;

use App\Models\SurveySubmission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 

class SurveySubmissionA implements FromCollection, WithHeadings
{
    private $rowNumber = 0;

    public function collection()
    {
        return SurveySubmission::with('user')->get()
            ->map(function ($data) {
                return [
                    'row_number' => ++$this->rowNumber,
                    'name' => $data->user->name ?? '-', 
                    'email' => $data->user->email ?? '-',
                    'range_usia' => $data->umur_range,
                    'status_pekerjaan' => $data->status_pekerjaan,
                    'tempat_bekerja' => $data->tempat_bekerja,
                    'tujuan_sertifikasi' => $data->tujuan_sertifikasi,
                    'rating_materi' => $data->rating_materi,
                    'rating_trainer' => $data->rating_trainer,
                    'rating_uji' => $data->rating_uji,
                    'rating_peningkatan_kompetensi' => $data->rating_peningkatan_kompetensi,
                    'rating_penerapan' => $data->rating_peningkatan_kompetensi,
                    'essay_perubahan' => $data->essay_perubahan,
                    'essay_manfaat' => $data->essay_manfaat,
                    'essay_saran' => $data->essay_saran,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Email',
            'Range Usia',
            'Status Pekerjaan',
            'Instansi Tempat Bekerja',
            'Tujuan Mengikuti Sertifikasi',
            'Materi training selama 12 sesi sesuai dengan kebutuhan kompetensi saya',
            'Trainer menyampaikan materi dengan jelas dan membantu',
            'Proses uji sertifikasi dilaksanakan secara adil dan transparan',
            'Setelah mengikuti program ini, pemahaman dan kompetensi saya meningkat',
            'Kompetensi hasil training ini sudah/akan saya terapkan dalam pekerjaan saya',
            'Perubahan paling nyata apa yang Anda rasakan setelah mengikuti program ini',
            'Dalam hal apa sertifikasi ini paling membantu Anda (pekerjaan, karier, atau praktik)',
            'Saran evaluasi untuk peningkatan kualitas program!',
        ];
    }
}