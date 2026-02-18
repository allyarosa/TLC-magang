<?php

namespace App\Services;

use App\Models\User;
use App\Models\ExamA;
use App\Models\CategoryA;
use App\Exceptions\ImportException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportNilaiLevelAService
{
    protected int $defaultPassingScore = 70;
    protected array $columnMapping = [];

    /**
     * Parse uploaded file (Excel atau CSV)
     */
    public function parseFile(UploadedFile $file): array
    {
        $extension = strtolower($file->getClientOriginalExtension());

        Log::info("Starting file parse: {$file->getClientOriginalName()}", ['extension' => $extension]);

        return match ($extension) {
            'xlsx', 'xls' => $this->parseExcelFile($file),
            'csv', 'txt'  => $this->parseCsvFile($file),
            default       => throw ImportException::invalidFormat($extension),
        };
    }

    /**
     * Build preview data dari parsed rows
     */
    public function buildPreviewData(array $rows): array
    {
        if (empty($rows)) {
            Log::warning('No data found in uploaded file');
            throw ImportException::noDataFound();
        }

        Log::info('Building preview data', ['total_rows' => count($rows)]);

        // Detect column mapping dari header row (baris pertama)
        $this->detectColumnMapping($rows[0] ?? []);

        // Remove header row
        array_shift($rows);

        $userIds = collect($rows)
            ->map(fn($row) => $this->extractValue($row, 'user_id'))
            ->filter(fn($id) => $id !== null && $id !== '')  // Keep 0 as valid ID
            ->unique();

        $users = User::whereIn('id', $userIds)->get()->keyBy('id');
        $previewData = [];

        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2; // +2 karena header di row 1 dan index start dari 0

            // Skip completely empty rows (all cells are null or empty string)
            // Note: array_filter with no callback removes falsy values including 0
            // So we need to check explicitly for null and empty string only
            $hasData = false;
            foreach ($row as $cell) {
                if ($cell !== null && $cell !== '') {
                    $hasData = true;
                    break;
                }
            }

            if (!$hasData) {
                continue;
            }

            $previewData[] = $this->validateRow($row, $rowNumber, $users);
        }

        if (empty($previewData)) {
            throw ImportException::noDataFound();
        }

        Log::info('Preview data built successfully', [
            'total' => count($previewData),
            'valid' => collect($previewData)->where('is_valid', true)->count(),
            'column_mapping' => $this->columnMapping,
        ]);

        return $previewData;
    }

    /**
     * Detect column mapping dari header row
     * Support 2 format:
     * 1. Template: user_id,pck,hots,literasi,numerasi
     * 2. Export: No,Nama,Email,PCK,HOTS,LITERASI,NUMERASI,Status
     */
    private function detectColumnMapping(array $headerRow): void
    {
        $this->columnMapping = [];

        foreach ($headerRow as $index => $columnName) {
            $normalized = strtolower(trim($columnName));

            // Map column name ke field name
            if (in_array($normalized, ['user_id', 'id'])) {
                $this->columnMapping['user_id'] = $index;
            } elseif ($normalized === 'no') {
                // "No" di export adalah nomor urut, cari kolom "nama" untuk ambil user dari nama
                $this->columnMapping['no'] = $index;
            } elseif (in_array($normalized, ['nama', 'name'])) {
                $this->columnMapping['nama'] = $index;
            } elseif ($normalized === 'email') {
                $this->columnMapping['email'] = $index;
            } elseif ($normalized === 'pck') {
                $this->columnMapping['pck'] = $index;
            } elseif ($normalized === 'hots') {
                $this->columnMapping['hots'] = $index;
            } elseif (in_array($normalized, ['literasi', 'literacy'])) {
                $this->columnMapping['literasi'] = $index;
            } elseif (in_array($normalized, ['numerasi', 'numeracy'])) {
                $this->columnMapping['numerasi'] = $index;
            } elseif ($normalized === 'status') {
                $this->columnMapping['status'] = $index;
            }
        }

        Log::info('Column mapping detected', ['mapping' => $this->columnMapping]);
    }

    /**
     * Extract value dari row berdasarkan column mapping
     */
    private function extractValue(array $row, string $field)
    {
        if (!isset($this->columnMapping[$field])) {
            return null;
        }

        $index = $this->columnMapping[$field];
        return $row[$index] ?? null;
    }

    /**
     * Save validated data to database
     */
    public function saveToDatabase(array $previewData): array
    {
        Log::info('Starting database save process', ['total_rows' => count($previewData)]);

        return DB::transaction(function () use ($previewData) {
            // Use UPPER case to match database values (HOTS, PCK, LITERASI, NUMERASI)
            // Also support lowercase for flexibility
            $categories = CategoryA::whereRaw('LOWER(name) IN (?, ?, ?, ?)', ['pck', 'hots', 'literasi', 'numerasi'])
                ->get()
                ->keyBy(fn($c) => strtolower($c->name));

            $success = 0;
            $error   = 0;

            foreach ($previewData as $row) {
                if (!$row['is_valid']) {
                    $error++;
                    Log::debug('Skipping invalid row', ['row' => $row['row'], 'errors' => $row['errors']]);
                    continue;
                }

                foreach (['pck', 'hots', 'literasi', 'numerasi'] as $field) {
                    $value = $row[$field] ?? null;

                    // Skip ONLY if truly empty (null or empty string)
                    // IMPORTANT: 0 is valid and must be saved (means failed/no points)
                    // DO NOT use empty() because empty(0) returns true!
                    if ($value === null || $value === '') {
                        continue;
                    }

                    $category = $categories[$field] ?? null;
                    if (!$category) {
                        Log::warning("Category not found: {$field}");
                        continue;
                    }

                    $passingScore = $category->passing_score ?? $this->defaultPassingScore;

                    ExamA::updateOrCreate(
                        [
                            'user_id'       => $row['user_id'],
                            'category_a_id' => $category->id,
                        ],
                        [
                            'score'     => (int)$value,  // Explicit cast to ensure 0 is saved
                            'is_passed' => $value >= $passingScore,
                            'status'    => 'finished',
                        ]
                    );

                    $success++;
                }
            }

            Log::info('Import completed successfully', ['success' => $success, 'errors' => $error]);
            return ['success' => $success, 'error' => $error];
        });
    }

    /**
     * Parse Excel file
     */
    private function parseExcelFile(UploadedFile $file): array
    {
        if (!class_exists(\ZipArchive::class)) {
            Log::error('php-zip extension not available for Excel parsing');
            throw ImportException::missingPhpZip();
        }

        try {
            $rows = \Maatwebsite\Excel\Facades\Excel::toArray(null, $file);
            
            if (empty($rows[0])) {
                throw new \Exception('File kosong');
            }

            Log::info('Excel file parsed successfully', ['rows_found' => count($rows[0])]);
            return $rows[0]; // Return semua rows termasuk header
        } catch (\Exception $e) {
            Log::error('Failed to parse Excel file', ['file' => $file->getClientOriginalName(), 'error' => $e->getMessage()]);
            throw ImportException::fileParseError($e->getMessage());
        }
    }

    /**
     * Parse CSV file
     */
    private function parseCsvFile(UploadedFile $file): array
    {
        try {
            $handle = fopen($file->getRealPath(), 'r');

            if (!$handle) {
                throw new \Exception('Cannot open file');
            }

            // Skip BOM if present
            $bom = fread($handle, 3);
            if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
                rewind($handle);
            }

            $data = [];
            while (($row = fgetcsv($handle)) !== false) {
                // Skip completely empty rows (all cells are null or empty)
                // Note: Don't use array_filter() alone as it removes 0 values
                $hasData = false;
                foreach ($row as $cell) {
                    if ($cell !== null && $cell !== '') {
                        $hasData = true;
                        break;
                    }
                }

                if (!$hasData) {
                    continue;
                }

                // Sanitize each cell
                $data[] = array_map(fn($cell) => $this->sanitizeValue($cell), $row);
            }

            fclose($handle);

            Log::info('CSV file parsed successfully', ['rows_found' => count($data)]);
            return $data; // Return semua rows termasuk header
        } catch (\Exception $e) {
            Log::error('Failed to parse CSV file', ['file' => $file->getClientOriginalName(), 'error' => $e->getMessage()]);
            throw ImportException::fileParseError($e->getMessage());
        }
    }

    /**
     * Validate single row
     */
    private function validateRow(array $row, int $rowNumber, Collection $users): array
    {
        $errors = [];
        $isValid = true;

        // Extract user_id atau cari dari nama/email
        $userId = $this->extractValue($row, 'user_id');
        
        // Jika tidak ada user_id, coba cari dari nama atau email
        // Note: gunakan === null untuk avoid false positive pada user_id = 0
        if ($userId === null || $userId === '' || !is_numeric($userId)) {
            $nama = $this->extractValue($row, 'nama');
            $email = $this->extractValue($row, 'email');

            if ($nama) {
                $user = $users->firstWhere('name', $nama);
                $userId = $user?->id;
            } elseif ($email) {
                $user = $users->firstWhere('email', $email);
                $userId = $user?->id;
            }

            if ($userId === null || $userId === '') {
                $errors[] = "User tidak ditemukan (nama: {$nama}, email: {$email})";
                $isValid = false;
            }
        } elseif (!$users->has($userId)) {
            $errors[] = "User ID '{$userId}' tidak ditemukan";
            $isValid = false;
        }

        $userName = $users->get($userId)?->name ?? $this->extractValue($row, 'nama') ?? '-';

        // Validate scores
        $scores = [];
        foreach (['pck', 'hots', 'literasi', 'numerasi'] as $field) {
            $value = $this->extractValue($row, $field);

            // Empty values (null, empty string, or dash) are allowed - will be skipped in save
            // IMPORTANT: 0 is a VALID value (means failed/no correct answers)
            if ($value === '' || $value === null || $value === '-') {
                $scores[$field] = null;
                continue;
            }

            // Convert to string if not already, then check if numeric
            $value = (string)$value;

            if (!is_numeric($value)) {
                $errors[] = strtoupper($field) . ' harus angka';
                $isValid = false;
                $scores[$field] = $value;
            } elseif ($value < 0 || $value > 100) {
                $errors[] = strtoupper($field) . ' harus angka 0-100';
                $isValid = false;
                $scores[$field] = $value;
            } else {
                // Convert to int - 0 is valid!
                $scores[$field] = (int)$value;
            }
        }

        return [
            'row' => $rowNumber,
            'user_id' => $userId,
            'user_name' => $userName,
            'pck' => $scores['pck'],
            'hots' => $scores['hots'],
            'literasi' => $scores['literasi'],
            'numerasi' => $scores['numerasi'],
            'is_valid' => $isValid,
            'errors' => $errors,
        ];
    }

    /**
     * Sanitize cell value
     * IMPORTANT: Preserve 0 as valid value (means failed/no points)
     */
    private function sanitizeValue($value)
    {
        // Truly empty values
        if ($value === null || $value === '') {
            return null;
        }

        // Trim whitespace
        $value = trim($value);

        // After trim, check again for empty string
        if ($value === '') {
            return null;
        }

        // Special case: "0" is valid and must be preserved
        if ($value === '0' || $value === 0) {
            return '0';
        }

        // Remove common formatting characters for numbers
        if (is_numeric(str_replace([',', ' '], '', $value))) {
            $value = str_replace([',', ' '], '', $value);
        }

        return $value;
    }
}
