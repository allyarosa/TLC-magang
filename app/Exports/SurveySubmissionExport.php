<?php

namespace App\Exports;

use App\Models\SurveySubmission;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveySubmissionExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    private $rowNumber = 0;

    public function query()
    {
        return SurveySubmission::query()->with(['user.userProfile']);
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Nama Lengkap',
            'No WA',
            'Gender',
            'Pendidikan',
            'Berapa usia Anda saat ini?',
            'Apa status pekerjaan Anda saat ini?',
            'Di mana instansi tempat Anda bekerja?',
            'Apa tujuan utama Anda mengikuti sertifikasi ini?',

            'Materi training selama 12 sesi sesuai dengan kebutuhan kompetensi saya.',

            'Trainer menyampaikan materi dengan jelas dan membantu.',

            'Proses uji sertifikasi dilaksanakan secara adil dan transparan.',

            'Setelah mengikuti program ini, pemahaman dan kompetensi saya meningkat.',

            'Kompetensi hasil training ini sudah/akan saya terapkan dalam pekerjaan saya.',

            'Perubahan paling nyata apa yang Anda rasakan setelah mengikuti program ini?',

            'Dalam hal apa sertifikasi ini paling membantu Anda (pekerjaan, karier, atau praktik)?',
            
            'Saran evaluasi untuk peningkatan kualitas program!',
        ];
    }

    public function map($submission): array
    {
        $this->rowNumber++;

        $tujuan = $submission->tujuan_sertifikasi;
        if (is_string($tujuan)) {
            // Decode if it's a JSON string, though cast should handle it usually, 
            // but strictly speaking safe to check.
            $decoded = json_decode($tujuan, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $tujuan = $decoded;
            }
        }

        $tujuanString = is_array($tujuan) ? implode(', ', $tujuan) : $tujuan;

        $profile = $submission->user && $submission->user->userProfile ? $submission->user->userProfile : null;

        return [
            $this->rowNumber,
            $submission->created_at ? $submission->created_at->format('d-m-Y H:i') : '-',
            $profile ? $profile->nama_depan : ($submission->user->name ?? '-'),
            $profile ? $profile->no_wa : '-',
            $profile ? $profile->jenis_kelamin : '-',
            $profile ? $profile->latar_belakang_pendidikan : '-',
            $submission->umur_range,
            $submission->status_pekerjaan,
            $submission->tempat_bekerja,
            $tujuanString,
            $this->mapRating($submission->rating_materi),
            $this->mapRating($submission->rating_trainer),
            $this->mapRating($submission->rating_uji),
            $this->mapRating($submission->rating_peningkatan_kompetensi),
            $this->mapRating($submission->rating_penerapan),
            $submission->essay_perubahan,
            $submission->essay_manfaat,
            $submission->essay_saran,
        ];
    }

    // Optional helper for mapping rating numbers to text if desired, 
    // or keep as numbers. User asked for "Excel yang rapi".
    // Usually raw numbers are fine, but "Sangat Setuju" etc might be better?
    // The previous code had mapping array:
    // 1 => 'Sangat Tidak Setuju', 2 => 'Tidak Setuju', 3 => 'Setuju', 4 => 'Sangat Setuju'
    // I will use that mapping for better readability.
    private function mapRating($rating)
    {
        $map = [
            1 => 'Sangat Tidak Setuju',
            2 => 'Tidak Setuju',
            3 => 'Setuju',
            4 => 'Sangat Setuju'
        ];
        return $map[$rating] ?? $rating;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
