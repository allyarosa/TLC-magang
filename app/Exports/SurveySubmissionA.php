<?php

namespace App\Exports;

use App\Models\SurveySubmission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 

class SurveySubmissionA implements FromCollection, WithHeadings
{
    private $rowNumber = 0;
    protected $type;

    public function __construct(string $type = 'all')
    {
        $this->type = $type;
    }

    public function collection()
    {
        $query = SurveySubmission::with([
            'user.examsA' => function ($q) {
                $q->where('category_a_id', 2)->where('status', 'finished');
            }
        ]);

        if ($this->type === 'pck') {
            $query->whereHas('user', function ($q) {
                $q->whereHas('permissions', function ($qp) {
                    $qp->where('name', 'PCK');
                })->whereDoesntHave('permissions', function ($qp) {
                    $qp->whereIn('name', ['access_level_A', 'HOTS', 'LITERASI', 'NUMERASI']);
                });
            });
        }

        return $query->get()->map(function ($data) {
            $pckExam = $data->user->examsA->first();
            $pckScore = $pckExam ? $pckExam->score : '-';

            return [
                'row_number' => ++$this->rowNumber,
                'name' => $data->user->name ?? '-', 
                'email' => $data->user->email ?? '-',
                'pck_score' => $pckScore,
                'range_usia' => $data->umur_range,
                'status_pekerjaan' => $data->status_pekerjaan,
                'tempat_bekerja' => $data->tempat_bekerja,
                'tujuan_sertifikasi' => is_array($data->tujuan_sertifikasi) ? implode(', ', $data->tujuan_sertifikasi) : $data->tujuan_sertifikasi,
                'rating_materi' => $data->rating_materi,
                'rating_trainer' => $data->rating_trainer,
                'rating_uji' => $data->rating_uji,
                'rating_peningkatan_kompetensi' => $data->rating_peningkatan_kompetensi,
                'rating_penerapan' => $data->rating_penerapan,
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
            'Nilai PCK',
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