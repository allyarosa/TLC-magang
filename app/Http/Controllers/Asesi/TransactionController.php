<?php

namespace App\Http\Controllers\Asesi;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $pembayaran = Payment::where('user_id', $userId)->orderBy('payment_time', 'desc')->get();

        $paymentCount = Payment::where('user_id', $userId)->count();

        $paymentSuccessCount = Payment::where('user_id', $userId)
            ->where('status', 'success')
            ->count();

        $paymentPendingCount = Payment::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();
        
        return view('dashboard.asesi.transaksi', [
            'paymentCount' => $paymentCount,
            'paymentSuccessCount' => $paymentSuccessCount,
            'paymentPendingCount' => $paymentPendingCount,
            'pembayaran' => $pembayaran
        ]);
    }

    public function invoice($id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        $paymentId = $decoded[0];
        $payment = Payment::where('id', $paymentId)
            ->where('user_id', Auth::id())
            ->where('status', 'success')
            ->firstOrFail();

        $pdf = Pdf::loadView('dashboard.asesi.invoice', compact('payment'));
        
        return $pdf->stream('Invoice-' . $payment->order_id . '.pdf');
    }
}
