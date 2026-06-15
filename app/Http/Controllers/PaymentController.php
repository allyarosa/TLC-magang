<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Payment;
use App\Models\SiteInfo;
use App\Models\User;
use App\Services\PaymentService;
use App\Services\VoucherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;
use Exception;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;
    protected VoucherService $voucherService;

    public function __construct(PaymentService $paymentService, VoucherService $voucherService)
    {
        $this->paymentService = $paymentService;
        $this->voucherService = $voucherService;
    }

    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('payments.index', compact('payments'));
    }

    public function create(string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];
        $level = Level::find($id);

        if (!$level) {
            return redirect()->back()->with('error', 'Level tidak ditemukan');
        }

        switch ($id) {
            case '1':
                return view('payments.create', ['level' => $level]);
            case '2':
                return view('payments.createB', ['level' => $level]);
            case '3':
                return view('payments.createC', ['level' => $level]);
            case '4':
                return view('payments.createAll', ['level' => $level]);
            default:
                return view('payments.create', ['level' => $level]);
        }
    }

    public function store(Request $request)
    {
        $user = User::with('userProfile')->where('id', Auth::id())->first();

        if (!$user->isProfileComplete()) {
            return redirect()->route('asesi.registerStepTwo')
                ->with('warning', 'Lengkapi profil Anda terlebih dahulu untuk melanjutkan pembayaran.');
        }

        $request->validate([
            'level_id'            => 'required|exists:levels,id',
            'mode'                => 'required|in:bundle,custom',
            'selected_categories' => 'nullable|string',
            'voucher_code'        => 'nullable|string'
        ]);

        $siteInfo = SiteInfo::getPaymentSettings();
        $paymentMode = $siteInfo->payment_method ?? 'midtrans';

        $data = $request->only(['level_id', 'mode', 'selected_categories']);

        if ($paymentMode === 'manual') {
            $rules = [
                'transfer_proof' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            ];
            
            if ($siteInfo->require_ig_follow_proof) {
                $rules['ig_follow_proof'] = 'required|image|mimes:jpeg,png,jpg|max:3072';
            }

            $request->validate($rules);

            $data['proofPath'] = $request->file('transfer_proof')->store('transfer_proofs', 'public');
            
            if ($request->hasFile('ig_follow_proof')) {
                $data['igProofPath'] = $request->file('ig_follow_proof')->store('ig_follow_proofs', 'public');
            }
        }

        try {
            $result = $this->paymentService->processCheckout($user, $data, $request->voucher_code);

            if ($result['type'] === 'success') {
                return redirect()->route('asesi.transaksi')
                    ->with('success', $result['message']);
            }

            if ($result['type'] === 'manual') {
                return redirect()->route('payments.detail', Hashids::encode($result['payment']->id))
                    ->with('success', $result['message']);
            }

            if ($result['type'] === 'midtrans') {
                return redirect()->route('payments.checkout', ['id' => $result['payment']->id]);
            }
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function confirmManual(Request $request, int $id)
    {
        $payment = Payment::with('user')->findOrFail($id);

        if ($payment->payment_method !== 'manual') {
            return redirect()->back()->with('error', 'Pembayaran ini bukan via transfer manual.');
        }

        if ($payment->status !== 'waiting_confirmation') {
            return redirect()->back()->with('error', 'Pembayaran sudah diproses sebelumnya.');
        }

        $payment->update([
            'status'       => 'success',
            'confirmed_at' => now(),
            'confirmed_by' => Auth::id(),
            'payment_time' => now(),
            'payment_type' => 'bank_transfer',
        ]);

        $payment->user->notify(new \App\Notifications\TransactionNotification($payment));
        try {
            \Illuminate\Support\Facades\Mail::to($payment->user->email)->send(new \App\Mail\PaymentVerifiedMail($payment));
        } catch (\Exception $e) {
            Log::error('Failed to send Payment Verified email', ['error' => $e->getMessage()]);
        }
        
        $this->paymentService->grantAsesiAccess($payment);

        Log::info('Manual payment confirmed by admin', [
            'payment_id'   => $payment->id,
            'confirmed_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi dan akses telah diberikan.');
    }

    public function checkout($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        if ($payment->status != 'pending') {
            return redirect()->route('payments.detail', Hashids::encode($payment->id))
                ->with('error', 'Pembayaran ini sudah diproses sebelumnya');
        }

        if (!$payment->snap_token || $payment->snap_token === '...') {
            try {
                $snapToken = app(PaymentService::class)->regenerateSnapToken($payment);
                $payment->update(['snap_token' => $snapToken]);
                $payment->user->notify(new \App\Notifications\TransactionNotification($payment));
            } catch (Exception $e) {
                return redirect()->route('asesi.transaksi')
                    ->with('error', 'Gagal memproses pembayaran. Silakan coba lagi.');
            }
        }

        $snapToken = $payment->snap_token;

        return view('payments.checkout', compact('payment', 'snapToken'));
    }

    public function finish(string $id)
    {
        $payment = Payment::where('order_id', $id)->first();
        if (!$payment) {
            abort(404);
        }

        //JIKA WEBHOOK TIDAK JALAN
        $payment->update(['status' => 'success']);

        $this->paymentService->grantAsesiAccess($payment);

        $user = User::firstWhere('id', $payment->user_id);
        $user->notify(new \App\Notifications\TransactionNotification($payment));

        $level = Level::find($payment->level_id);
        $levelName = $level ? $level->level_name : '-';
        return view('payments.finish', [
            'payment' => $payment,
            'levelName' => $levelName,
        ]);
    }

    public function notification(Request $request)
    {
        // Require manual setup because midtrans config wasn't initialized in constructor 
        // since we bypassed it by placing it in PaymentService, but here we can just initialize it:
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);

        $notif = new \Midtrans\Notification();

        $orderId = $notif->order_id;
        $status = $notif->transaction_status;
        $fraudStatus = $notif->fraud_status;
        $paymentType = $notif->payment_type;

        $payment = Payment::with('user')->where('order_id', $orderId)->firstOrFail();

        if ($status == 'capture') {
            if ($fraudStatus == 'challenge') {
                $payment->status = 'pending';
            } else if ($fraudStatus == 'accept') {
                $payment->status = 'success';
            }
        } else if ($status == 'settlement') {
            $payment->status = 'success';
        } else if ($status == 'cancel' || $status == 'deny' || $status == 'expire') {
            $payment->status = 'failed';
            if ($payment->voucher_id) {
                $this->voucherService->refundUsage($payment->voucher_id);
            }
        } else if ($status == 'pending') {
            $payment->status = 'pending';
        }

        $payment->transaction_id = $notif->transaction_id;
        $payment->payment_type = $paymentType;
        $payment->payment_time = now();
        $payment->payment_details = json_decode(json_encode($notif), true);
        $payment->save();

        $payment->user->notify(new \App\Notifications\TransactionNotification($payment));

        if ($payment->status == 'success') {
            $this->paymentService->grantAsesiAccess($payment);
        }

        return response()->json(['status' => 'success']);
    }

    public function detail($id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        $paymentId = $decoded[0];
        $payment = Payment::findOrFail($paymentId);

        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        return view('payments.detail', compact('payment'));
    }
}