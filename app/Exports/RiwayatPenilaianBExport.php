<?php

namespace App\Exports;

use App\Models\LevelBHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class RiwayatPenilaianBExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LevelBHistory::with('user')
            ->get()
            ->map(function ($result) {
                return [
                    'user_name' => optional($result->user)->name,
                    'email' => optional($result->user)->email,
                    'category' => $result->category,
                    'tanggal_review' => $result->created_at->format('d F Y H:i'),
                    'description' => $result->description,
                    'is_passed' => $result->is_passed,
                    'score' => $result->score
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama Asesi', 'Email', 'Category', 'Tanggal Review', 'Description', 'Is Passed', 'Score'];
    }
}
