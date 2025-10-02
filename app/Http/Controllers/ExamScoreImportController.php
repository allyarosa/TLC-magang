<?php

namespace App\Http\Controllers;

use App\Imports\ExamScoresImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExamScoreImportController extends Controller
{
    public function showImportForm()
    {
        return view('admin.import-scores');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        try {
            $import = new ExamScoresImport();
            Excel::import($import, $request->file('file'));

            $message = "Import selesai! " .
                "Berhasil: {$import->getSuccessCount()}, " .
                "Gagal: {$import->getSkipCount()}";

            if (count($import->getErrors()) > 0) {
                return back()->with([
                    'success' => $message,
                    'errors' => $import->getErrors()
                ]);
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_scores.csv"',
        ];

        $columns = ['nama', 'pck', 'hots', 'literasi', 'numerasi'];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            // Contoh data
            fputcsv($file, ['John Doe', '85', '90', '88', '92']);
            fputcsv($file, ['Jane Smith', '78', '82', '75', '80']);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}