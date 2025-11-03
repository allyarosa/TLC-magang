<?php

namespace App\Imports;

use App\Models\ExamA;
use App\Models\User;
use App\Models\CategoryA;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExamScoresImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;

    protected $errors = [];
    protected $successCount = 0;
    protected $skipCount = 0;

    // Mapping category nama ke ID (UPDATED)
    protected $categoryMapping = [
        'HOTS' => 1,        // id 1 = HOTS
        'PCK' => 2,         // id 2 = PCK
        'Literasi' => 3,    // id 3 = Literasi
        'Numerasi' => 4,    // id 4 = Numerasi
    ];

    /**
     * @param array $row
     * Format Excel yang diharapkan:
     * | nama | pck | hots | literasi | numerasi |
     * | John Doe | 85 | 90 | 88 | 92 |
     */
    public function model(array $row)
    {
        try {
            DB::beginTransaction();

            // Cari user berdasarkan nama (case-insensitive)
            // Asumsi: nama di Excel adalah nama_depan di user_profiles
            $user = DB::table('users')
                ->where('name', 'LIKE', '%' . trim($row['nama']) . '%')
                ->first();
            $users = User::where('name', 'LIKE', '%' . trim($row['nama']) . '%')->first();

            if (!$user) {
                $this->skipCount++;
                $this->errors[] = "User dengan nama '{$row['nama']}' tidak ditemukan";
                DB::rollBack();
                return null;
            }

            // Mapping kolom Excel ke category_a_id
            // PENTING: Urutan sesuai dengan category_a_id
            $scores = [
                'HOTS' => $row['hots'] ?? null,        // category_a_id = 1
                'PCK' => $row['pck'] ?? null,          // category_a_id = 2
                'Literasi' => $row['literasi'] ?? null,// category_a_id = 3
                'Numerasi' => $row['numerasi'] ?? null,// category_a_id = 4
            ];

            foreach ($scores as $categoryName => $score) {
                if ($score !== null) {
                    $categoryId = $this->categoryMapping[$categoryName];

                    // Insert new exam record
                    ExamA::create([
                        'user_id' => $user->id,
                        'category_a_id' => $categoryId,
                        'score' => $score,
                        'is_passed' => true, 
                        'created_at' => now(),
                        'updated_at' => now(),
                        'start_time' => now(),
                        'end_time' => now(),
                    ]);
                }
                $users->givePermissionTo(['HOTS', 'PCK', 'LITERASI', 'NUMERASI', 'level_A_completed']);
            }

            $this->successCount++;
            DB::commit();

            Log::info("Import success for user: {$row['nama']} (user_id: {$user->id})");

        } catch (\Exception $e) {
            DB::rollBack();
            $this->skipCount++;
            $this->errors[] = "Error untuk {$row['nama']}: " . $e->getMessage();
            Log::error("Import error for user {$row['nama']}: " . $e->getMessage());
        }

        return null;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'pck' => 'nullable|numeric|min:0|max:100',
            'hots' => 'nullable|numeric|min:0|max:100',
            'literasi' => 'nullable|numeric|min:0|max:100',
            'numerasi' => 'nullable|numeric|min:0|max:100',
        ];
    }

    public function onError(\Throwable $e)
    {
        $this->errors[] = $e->getMessage();
    }

    public function onFailure(\Maatwebsite\Excel\Validators\Failure ...$failures)
    {
        foreach ($failures as $failure) {
            $this->errors[] = "Row {$failure->row()}: " . implode(', ', $failure->errors());
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getSkipCount()
    {
        return $this->skipCount;
    }
}