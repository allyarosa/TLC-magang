<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNilaiRequest;
use App\Http\Requests\UpdateUserScoresRequest;
use App\Http\Requests\ImportFileRequest;
use App\Services\HasilPenilaianAService;
use App\Services\ImportNilaiLevelAService;
use App\Services\ImportCacheService;
use App\Exceptions\ImportException;
use App\Exports\HasilPenilaianAExport;
use App\Exports\HasilPenilaianATemplateExport;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class HasilPenilaianAController extends Controller
{
    private const IMPORT_PER_PAGE = 10;

    public function __construct(
        protected HasilPenilaianAService $hasilPenilaianService,
        protected ImportNilaiLevelAService $importService,
        protected ImportCacheService $cacheService,
    ) {}


    public function index(Request $request)
    {
        return view('admin.hasilPenilaianA.index', $this->hasilPenilaianService->getIndexData($request));
    }


    public function editUser(int $userId)
    {
        return view('admin.hasilPenilaianA.edit-user', $this->hasilPenilaianService->getUserEditData($userId));
    }

    public function updateUser(UpdateUserScoresRequest $request, int $userId)
    {
        try {
            $this->hasilPenilaianService->updateUserScores($request, $userId);

            return redirect()->route('admin.level.a.hasil-penilaian')
                ->with('success', 'Nilai berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Failed to update user scores', [
                'user_id' => $userId, 
                'error' => $e->getMessage()
            ]);
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui nilai.');
        }
    }


    public function update(UpdateNilaiRequest $request, int $id)
    {
        $this->hasilPenilaianService->updateSingleExam($request->validated(), $id);

        return redirect()->route('admin.level.a.hasil-penilaian')
            ->with('success', 'Nilai berhasil diperbarui!');
    }


    public function destroy(int $id)
    {
        $this->hasilPenilaianService->deleteExam($id);

        return redirect()->route('admin.level.a.hasil-penilaian')
            ->with('success', 'Data berhasil dihapus!');
    }


    public function export(Request $request)
    {
        try {
            $format = $request->get('format', 'csv');

            if (!in_array($format, ['csv', 'xlsx'])) {
                return redirect()->back()->with('error', 'Format file tidak valid.');
            }

            if ($format === 'xlsx' && !class_exists(\ZipArchive::class)) {
                return redirect()->back()->with('error', 'Format XLSX tidak tersedia. Gunakan CSV.');
            }

            Log::info('Starting export', ['format' => $format]);

            $filename = 'hasil-penilaian-level-a-' . now()->format('Y-m-d-His');
            $exporter = new HasilPenilaianAExport();

            $excelFormat = $format === 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV;

            Log::info('Export completed successfully', ['format' => $format, 'filename' => $filename]);

            return Excel::download($exporter, $filename . '.' . $format, $excelFormat);
        } catch (\Exception $e) {
            Log::error('Export failed', ['format' => $request->get('format'), 'error' => $e->getMessage()]);
            
            return redirect()->back()->with('error', 'Gagal mengekspor data.');
        }
    }


    public function downloadTemplate()
    {
        try {
            $filename = 'template-import-nilai-level-a-' . now()->format('Y-m-d-His');

            Log::info('Downloading import template', ['filename' => $filename]);

            return Excel::download(
                new HasilPenilaianATemplateExport(),
                $filename . '.csv',
                \Maatwebsite\Excel\Excel::CSV
            );
        } catch (\Exception $e) {
            Log::error('Failed to download template', ['error' => $e->getMessage()]);
            
            return redirect()->back()->with('error', 'Gagal mendownload template.');
        }
    }


    public function importForm()
    {
        return view('admin.hasilPenilaianA.import');
    }


    public function previewImport(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->paginatePreviewData($request);
        }

        return $this->handleFileUpload($request);
    }


    public function processImport()
    {
        try {
            $sessionId = session('import_session_id');
            
            if (!$sessionId) {
                return redirect()->route('admin.level.a.hasil-penilaian.import-form')
                    ->with('error', 'Session import tidak ditemukan.');
            }

            $previewData = $this->cacheService->retrieve($sessionId);

            if (empty($previewData)) {
                return redirect()->route('admin.level.a.hasil-penilaian.import-form')
                    ->with('error', 'Data import tidak ditemukan atau sudah kedaluwarsa.');
            }

            Log::info('Processing import', ['session_id' => $sessionId, 'rows' => count($previewData)]);

            $result = $this->importService->saveToDatabase($previewData);

            $this->cacheService->forget($sessionId);
            session()->forget('import_session_id');

            $message = "Import berhasil! {$result['success']} nilai diupdate, {$result['error']} baris gagal.";

            Log::info('Import process completed', $result);

            return redirect()->route('admin.level.a.hasil-penilaian')->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Import process failed', ['error' => $e->getMessage()]);
            
            return redirect()->route('admin.level.a.hasil-penilaian.import-form')
                ->with('error', 'Terjadi kesalahan saat memproses import.');
        }
    }


    private function handleFileUpload(Request $request)
    {
        try {
            // Validate using ImportFileRequest rules
            $validated = $request->validate((new ImportFileRequest())->rules());
            
            $file = $request->file('file');
            
            Log::info('Starting file upload process', [
                'filename' => $file->getClientOriginalName(),
                'size' => $file->getSize()
            ]);

            $rows = $this->importService->parseFile($file);
            $previewData = $this->importService->buildPreviewData($rows);

            $sessionId = $this->cacheService->generateSessionId();
            $this->cacheService->store($sessionId, $previewData);
            
            session(['import_session_id' => $sessionId]);

            Log::info('File upload completed successfully', [
                'session_id' => $sessionId,
                'rows_processed' => count($previewData)
            ]);

            return $this->buildPreviewView($previewData, 1);
        } catch (ImportException $e) {
            Log::warning('Import validation failed', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('File validation failed', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('File upload failed', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses file.');
        }
    }


    private function paginatePreviewData(Request $request)
    {
        $sessionId = session('import_session_id');
        
        if (!$sessionId) {
            return redirect()->route('admin.level.a.hasil-penilaian.import-form')
                ->with('error', 'Session import tidak ditemukan.');
        }

        $previewData = $this->cacheService->retrieve($sessionId);

        if (empty($previewData)) {
            return redirect()->route('admin.level.a.hasil-penilaian.import-form')
                ->with('error', 'Data tidak ditemukan atau sudah kedaluwarsa. Upload file terlebih dahulu.');
        }

        $page = $request->get('page', 1);

        return $this->buildPreviewView($previewData, $page);
    }


    private function buildPreviewView(array $previewData, int $page)
    {
        $total        = count($previewData);
        $collection   = collect($previewData);

        $paginatedData = new LengthAwarePaginator(
            $collection->slice(($page - 1) * self::IMPORT_PER_PAGE, self::IMPORT_PER_PAGE)->values(),
            $total,
            self::IMPORT_PER_PAGE,
            $page,
            ['path' => route('admin.level.a.hasil-penilaian.preview-import')]
        );

        $validCount   = $collection->where('is_valid', true)->count();
        $invalidCount = $total - $validCount;

        return view('admin.hasilPenilaianA.preview-import', compact(
            'paginatedData',
            'validCount',
            'invalidCount',
            'total'
        ));
    }
}
