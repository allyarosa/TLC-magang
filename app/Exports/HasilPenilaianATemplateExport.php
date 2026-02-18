<?php

namespace App\Exports;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

/**
 * Template Export for Import Nilai Level A
 * Format: user_id, pck, hots, literasi, numerasi
 */
class HasilPenilaianATemplateExport implements FromCollection, WithHeadings
{
    /**
     * Return header columns
     */
    public function headings(): array
    {
        return [
            'user_id',
            'pck',
            'hots',
            'literasi',
            'numerasi',
        ];
    }

    /**
     * Return user data dengan nilai saat ini (atau kosong jika belum ada)
     * User bisa langsung edit nilai di template ini
     */
    public function collection()
    {
        $data = collect();
        
        // Get all users yang punya exam Level A
        $users = User::whereHas('examsA')
            ->orderBy('name')
            ->get();

        // Get categories (use LOWER for case-insensitive matching)
        $categories = CategoryA::whereRaw('LOWER(name) IN (?, ?, ?, ?)', ['pck', 'hots', 'literasi', 'numerasi'])
            ->get()
            ->keyBy(fn($cat) => strtolower($cat->name));

        foreach ($users as $user) {
            // Get exams untuk user ini
            $exams = ExamA::where('user_id', $user->id)
                ->whereIn('category_a_id', $categories->pluck('id'))
                ->get()
                ->keyBy('category_a_id');

            $row = [
                'user_id' => $user->id,
                'pck' => $this->getScore($exams, $categories['pck'] ?? null),
                'hots' => $this->getScore($exams, $categories['hots'] ?? null),
                'literasi' => $this->getScore($exams, $categories['literasi'] ?? null),
                'numerasi' => $this->getScore($exams, $categories['numerasi'] ?? null),
            ];

            $data->push($row);
        }

        // Jika tidak ada user dengan exam, berikan contoh data
        if ($data->isEmpty()) {
            $data->push([
                'user_id' => 1,
                'pck' => 85,
                'hots' => 90,
                'literasi' => 88,
                'numerasi' => 92,
            ]);
            $data->push([
                'user_id' => 2,
                'pck' => 75,
                'hots' => 80,
                'literasi' => 78,
                'numerasi' => 82,
            ]);
        }

        return $data;
    }

    /**
     * Get score dari exam untuk category tertentu
     */
    private function getScore($exams, $category)
    {
        if (!$category) {
            return '';
        }

        $exam = $exams->get($category->id);
        return $exam ? $exam->score : '';
    }
}
