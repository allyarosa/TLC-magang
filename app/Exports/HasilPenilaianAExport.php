<?php

namespace App\Exports;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Export for Hasil Penilaian Level A
 * Supports both CSV (native) and XLSX (via Maatwebsite Excel)
 */
class HasilPenilaianAExport implements FromCollection, WithHeadings, WithStyles
{
    protected $passingScore = 70;
    protected $categories;

    public function __construct()
    {
        $this->categories = CategoryA::all();
    }

    /**
     * Generate CSV content and return as downloadable response (native PHP)
     */
    public function download(string $filename): Response
    {
        $csvContent = $this->generateCsv();
        
        return response($csvContent, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    /**
     * For Maatwebsite Excel - returns collection of data
     */
    public function collection(): Collection
    {
        $data = [];

        // Get users with completed exams
        $users = User::whereHas('examsA', function ($query) {
            $query->whereIn('status', ['finished', 'completed']);
        })->orderBy('name')->get();

        if ($users->isEmpty() || $this->categories->isEmpty()) {
            return collect([]);
        }

        $no = 1;
        foreach ($users as $user) {
            $userExams = ExamA::where('user_id', $user->id)
                ->whereIn('status', ['finished', 'completed'])
                ->get()
                ->keyBy('category_a_id');

            // Include user_id untuk memudahkan re-import
            $row = [$no++, $user->id, $user->name, $user->email];

            $allPassed = true;
            foreach ($this->categories as $category) {
                $exam = $userExams->get($category->id);
                // Cast to string so PhpSpreadsheet/Maatwebsite Excel doesn't drop integer 0
                $score = ($exam && $exam->score !== null) ? strval($exam->score) : '-';
                $row[] = $score;
                
                if (!$exam || is_null($exam->score) || $exam->score < ($category->passing_score ?? $this->passingScore)) {
                    $allPassed = false;
                }
            }

            $row[] = $allPassed ? 'Lulus Semua' : 'Belum Lulus Semua';

            $data[] = $row;
        }

        return collect($data);
    }

    /**
     * For Maatwebsite Excel - returns headings
     */
    public function headings(): array
    {
        $headers = ['No', 'ID', 'Nama', 'Email'];
        
        foreach ($this->categories as $category) {
            $headers[] = strtoupper($category->name);
        }
        
        $headers[] = 'Status';
        
        return $headers;
    }

    /**
     * For Maatwebsite Excel - style the header row
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * Generate CSV content (native PHP)
     */
    public function generateCsv(): string
    {
        $output = fopen('php://temp', 'r+');
        
        // Add BOM for Excel UTF-8 compatibility
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Validate if there are categories
        if ($this->categories->isEmpty()) {
            fputcsv($output, ['Tidak ada data kategori yang tersedia.']);
            rewind($output);
            return stream_get_contents($output);
        }

        // Header row
        fputcsv($output, $this->headings());

        // Get data collection
        $data = $this->collection();

        if ($data->isEmpty()) {
            fputcsv($output, ['Tidak ada data user dengan ujian yang selesai.']);
            rewind($output);
            return stream_get_contents($output);
        }

        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return $csvContent;
    }
}
