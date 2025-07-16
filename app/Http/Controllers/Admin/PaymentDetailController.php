<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentDetailController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Payment::with('user');

            // Filter by status
            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            // Filter by date range
            if ($request->filled('date_from')) {
                $query->whereDate('created_at', '>=', $request->date_from);
            }

            if ($request->filled('date_to')) {
                $query->whereDate('created_at', '<=', $request->date_to);
            }

            // Search by user name, email, or order ID
            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('order_id', 'like', '%' . $searchTerm . '%')
                      ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                          $userQuery->where('name', 'like', '%' . $searchTerm . '%')
                                   ->orWhere('email', 'like', '%' . $searchTerm . '%');
                      });
                });
            }

            // Filter by payment type
            if ($request->filled('payment_type')) {
                $query->where('payment_type', $request->payment_type);
            }

            // Get paginated results
            $payments = $query->orderBy('created_at', 'desc')
                             ->paginate(15)
                             ->withQueryString();

            // Calculate statistics
            $stats = [
                'total_payments' => Payment::count(),
                'total_success' => Payment::where('status', 'success')->count(),
                'total_pending' => Payment::where('status', 'pending')->count(),
                'total_failed' => Payment::where('status', 'failed')->count(),
                'total_amount' => Payment::where('status', 'success')->sum('amount') ?? 0,
            ];

            return view('admin.payments.index', compact('payments', 'stats'));

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memuat data pembayaran: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $payment = Payment::with('user')->findOrFail($id);
            return view('admin.payments.show', compact('payment'));
        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')
                           ->with('error', 'Data pembayaran tidak ditemukan.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,success,failed,expired'
            ]);

            $payment = Payment::findOrFail($id);

            // Update status
            $payment->update([
                'status' => $request->status,
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                           ->withErrors($e->validator)
                           ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status pembayaran.');
        }
    }

    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();

            return redirect()->route('admin.payments.index')
                           ->with('success', 'Data pembayaran berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')
                           ->with('error', 'Gagal menghapus data pembayaran.');
        }
    }

    public function export(Request $request)
    {
        try {
            $query = Payment::with('user');

            // Apply same filters as index method
            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            if ($request->filled('date_from')) {
                $query->whereDate('created_at', '>=', $request->date_from);
            }

            if ($request->filled('date_to')) {
                $query->whereDate('created_at', '<=', $request->date_to);
            }

            if ($request->filled('payment_type')) {
                $query->where('payment_type', $request->payment_type);
            }

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('order_id', 'like', '%' . $searchTerm . '%')
                      ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                          $userQuery->where('name', 'like', '%' . $searchTerm . '%')
                                   ->orWhere('email', 'like', '%' . $searchTerm . '%');
                      });
                });
            }

            $payments = $query->orderBy('created_at', 'desc')->get();

            $filename = 'payments_' . now()->format('Y-m-d_H-i-s') . '.csv';

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$filename\"",
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => '0'
            ];

            $callback = function() use ($payments) {
                $file = fopen('php://output', 'w');

                // Add BOM for UTF-8
                fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

                // CSV Headers
                fputcsv($file, [
                    'Order ID',
                    'User Name',
                    'User Email',
                    'Amount (IDR)',
                    'Status',
                    'Payment Type',
                    'Transaction ID',
                    'Payment Time',
                    'Created At'
                ]);

                // CSV Data
                foreach ($payments as $payment) {
                    fputcsv($file, [
                        $payment->order_id ?? '-',
                        $payment->user->name ?? '-',
                        $payment->user->email ?? '-',
                        number_format($payment->amount, 0, ',', '.'),
                        ucfirst($payment->status),
                        $payment->payment_type ?? '-',
                        $payment->transaction_id ?? '-',
                        $payment->payment_time ? $payment->payment_time->format('Y-m-d H:i:s') : '-',
                        $payment->created_at->format('Y-m-d H:i:s'),
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);

        } catch (\Exception $e) {
            return redirect()->route('admin.payments.index')
                           ->with('error', 'Gagal mengekspor data pembayaran.');
        }
    }

    /**
     * Get payment statistics for dashboard
     */
    public function getStats()
    {
        try {
            return [
                'total_payments' => Payment::count(),
                'total_success' => Payment::where('status', 'success')->count(),
                'total_pending' => Payment::where('status', 'pending')->count(),
                'total_failed' => Payment::where('status', 'failed')->count(),
                'total_amount' => Payment::where('status', 'success')->sum('amount') ?? 0,
                'today_payments' => Payment::whereDate('created_at', today())->count(),
                'today_amount' => Payment::where('status', 'success')
                                        ->whereDate('created_at', today())
                                        ->sum('amount') ?? 0,
            ];
        } catch (\Exception $e) {
            return [
                'total_payments' => 0,
                'total_success' => 0,
                'total_pending' => 0,
                'total_failed' => 0,
                'total_amount' => 0,
                'today_payments' => 0,
                'today_amount' => 0,
            ];
        }
    }
}
