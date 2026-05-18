<?php

namespace App\Http\Controllers;

use App\Events\PaymentSuccessful;
use App\Events\PaymentSuccessfulManual;
use App\Models\CategoryA;
use App\Models\Level;
use App\Models\Payment;
use App\Models\SiteInfo;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Vinkla\Hashids\Facades\Hashids;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
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
        ]);

        $orderId     = 'ORDER-' . time() . '-' . Str::random(5);
        $siteInfo    = SiteInfo::getPaymentSettings();
        $paymentMode = $siteInfo->payment_method ?? 'midtrans';

        // ---------------------------------------------------------
        // SECURE CALCULATION FROM DATABASE
        // ---------------------------------------------------------
        $calculatedAmount = 0;
        $selectedCategoriesArray = [];

        if ($request->mode === 'bundle') {
            $level = Level::findOrFail($request->level_id);
            $calculatedAmount = $level->price ?? 150000;
        } else {
            if ($request->filled('selected_categories')) {
                // explode "hots,literasi" into array ['hots', 'literasi']
                $selectedCategoriesArray = explode(',', $request->selected_categories);
                
                // map to uppercase for matching db
                $dbNames = array_map('strtoupper', $selectedCategoriesArray);
                
                $categories = CategoryA::whereIn('name', $dbNames)->get();
                $calculatedAmount = $categories->sum('price');
                
                // Ensure at least one category was valid
                if ($calculatedAmount <= 0) {
                    return redirect()->back()->with('error', 'Kategori tidak valid.');
                }
            } else {
                return redirect()->back()->with('error', 'Silakan pilih minimal satu kategori.');
            }
        }

        // ================================================================
        // MANUAL BANK TRANSFER FLOW
        // ================================================================
        if ($paymentMode === 'manual') {
            $rules = [
                'transfer_proof' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            ];
            
            if ($siteInfo->require_ig_follow_proof) {
                $rules['ig_follow_proof'] = 'required|image|mimes:jpeg,png,jpg|max:3072';
            }

            $request->validate($rules);

            $proofPath = $request->file('transfer_proof')->store('transfer_proofs', 'public');
            
            $igProofPath = null;
            if ($request->hasFile('ig_follow_proof')) {
                $igProofPath = $request->file('ig_follow_proof')->store('ig_follow_proofs', 'public');
            }

            $payment = Payment::create([
                'user_id'             => Auth::id(),
                'order_id'            => $orderId,
                'level_id'            => $request->level_id,
                'amount'              => $calculatedAmount,
                'mode'                => $request->mode,
                'selected_categories' => $selectedCategoriesArray,
                'status'              => 'waiting_confirmation',
                'payment_method'      => 'manual',
                'transfer_proof'      => $proofPath,
                'ig_follow_proof'     => $igProofPath,
            ]);

            $user->notify(new TransactionNotification($payment));

            Log::info('Manual payment submitted', [
                'payment_id' => $payment->id,
                'user_id'    => Auth::id(),
                'amount'     => $calculatedAmount,
            ]);

            return redirect()->route('payments.detail', Hashids::encode($payment->id))
                ->with('success', 'Bukti transfer berhasil dikirim. Menunggu konfirmasi admin.');
        }

        // ================================================================
        // MIDTRANS FLOW
        // ================================================================
        $this->setupMidtransConfig();

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $calculatedAmount,
            ],
            'customer_details' => [
                'user_id'    => Auth::id(),
                'first_name' => $user->name,
                'email'      => $user->email,
                'billing_address' => [
                    'first_name'   => $user->name,
                    'last_name'    => '',
                    'email'        => $user->email,
                    'phone'        => $user->userProfile->no_wa ?? '',
                    'city'         => $user->userProfile->kabupaten ?? '',
                    'country_code' => 'IDN',
                ]
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $payment = Payment::create([
                'user_id'             => Auth::id(),
                'order_id'            => $orderId,
                'level_id'            => $request->level_id,
                'amount'              => $calculatedAmount,
                'mode'                => $request->mode,
                'selected_categories' => $selectedCategoriesArray,
                'snap_token'          => $snapToken,
                'status'              => 'pending',
                'payment_method'      => 'midtrans',
            ]);

            $user->notify(new TransactionNotification($payment));

            return redirect()->route('payments.checkout', ['id' => $payment->id]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error:', [
                'message'  => $e->getMessage(),
                'file'     => $e->getFile(),
                'line'     => $e->getLine(),
                'order_id' => $orderId,
                'amount'   => $calculatedAmount,
            ]);

            return redirect()->back()->with('error', 'Error creating payment: ' . $e->getMessage());
        }
    }

    /**
     * Admin mengkonfirmasi pembayaran manual dan memberikan akses level ke user.
     */
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
        // MATIKAN SEMENTARA FITUR GRANT LEVEL UNTUK PEMBAYARAN MANUAL, KARENA ADA KEBIJAKAN BARU DARI ADMIN UNTUK MENGKONFIRMASI PEMBAYARAN MANUAL SECARA MANUAL JUGA, JADI TIDAK LANGSUNG GRANT AKSES SAAT KONFIRMASI, MELAINKAN ADMIN AKAN MENGKONFIRMASI PEMBAYARAN MANUAL TERLEBIH DAHULU, BARU SETELAH ITU BARU MEMBERIKAN AKSES LEVEL SECARA MANUAL PULA.
        // $this->grantLevelAccess($payment);

        $payment->user->notify(new TransactionNotification($payment));
        try {
            \Illuminate\Support\Facades\Mail::to($payment->user->email)->send(new \App\Mail\PaymentVerifiedMail($payment));
        } catch (\Exception $e) {
            Log::error('Failed to send Payment Verified email', ['error' => $e->getMessage()]);
        }
        // setup pembayaran
        $this->grantAsesiAccess($payment);

        Log::info('Manual payment confirmed by admin', [
            'payment_id'   => $payment->id,
            'confirmed_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi dan akses telah diberikan.');
    }

    private function grantAsesiAccess( $payment): void
    {
        if ($payment->mode === 'bundle') {
            event(new PaymentSuccessful($payment));
        } else {
            event(new PaymentSuccessfulManual($payment));
        }
    }

    /**
     * Berikan izin akses level berdasarkan level_id payment.
     */
    private function grantLevelAccess(Payment $payment): void
    {
        $user = User::find($payment->user_id);
        if (!$user) return;

        switch ($payment->level_id) {
            case 1:
                $user->givePermissionTo('access_level_A');
                break;
            case 2:
                $user->givePermissionTo('access_level_B');
                break;
            case 3:
                $user->givePermissionTo('access_level_C');
                break;
            case 4:
                $user->givePermissionTo('access_level_A', 'access_level_B', 'access_level_C');
                break;
        }

        if ($user->hasPermissionTo('fresh_user')) {
            $user->revokePermissionTo('fresh_user');
        }
    }

    private function setupMidtransConfig()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
    }

    public function checkout($id)
    {
        $payment = Payment::findOrFail($id);

        // Pastikan payment milik user yang login
        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        // Pastikan status masih pending
        if ($payment->status != 'pending') {
            return redirect()->route('payments.detail', Hashids::encode($payment->id))
                ->with('error', 'Pembayaran ini sudah diproses sebelumnya');
        }

        // Cek apakah snap_token valid
        if (!$payment->snap_token || $payment->snap_token === '...') {
            // Regenerate snap token jika tidak valid
            $this->setupMidtransConfig();

            $user = $payment->user;

            // Pastikan user profile sudah lengkap sebelum generate token
            if (!$user->isProfileComplete()) {
                return redirect()->route('asesi.profile')
                    ->with('warning', 'Lengkapi profil Anda terlebih dahulu untuk melanjutkan pembayaran');
            }

            $params = [
                'transaction_details' => [
                    'order_id' => $payment->order_id,
                    'gross_amount' => (int) $payment->amount,
                ],
                'customer_details' => [
                    'user_id' => $user->id,
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'billing_address' => [
                        'first_name' => $user->name,
                        'last_name' => '',
                        'email' => $user->email,
                        'phone' => $user->userProfile->no_wa ?? '',
                        'city' => $user->userProfile->kabupaten ?? '',
                        'country_code' => 'IDN',
                    ]
                ],
            ];

            try {
                $snapToken = Snap::getSnapToken($params);
                $payment->update(['snap_token' => $snapToken]);

                // Notify user about the new snap token
                $user->notify(new TransactionNotification($payment));

                \Log::info('Snap token regenerated successfully:', [
                    'payment_id' => $payment->id,
                    'order_id' => $payment->order_id,
                    'new_token' => substr($snapToken, 0, 20) . '...' // Log partial token for security
                ]);
            } catch (\Exception $e) {
                \Log::error('Error regenerating snap token:', [
                    'payment_id' => $payment->id,
                    'order_id' => $payment->order_id,
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);

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

        //JIKA WEBHOOK TIDAK JALAN
        $payment->update([
            'status' => 'success'
        ]);

        // Grant access based on level_id
        $user = User::firstWhere('id', $payment->user_id);

        switch ($payment->level_id) {
            case 1:
                $user->givePermissionTo('access_level_A');
                break;
            case 2:
                $user->givePermissionTo('access_level_B');
                break;
            case 3:
                $user->givePermissionTo('access_level_C');
                break;
            case 4:
                $user->givePermissionTo('access_level_C', 'access_level_B', 'access_level_A');
                break;
            default:
                break;
        }

        $user->notify(new TransactionNotification($payment));

        //JIKA WEBHOOK TIDAK JALAN

        if (!$payment) {
            abort(404);
        }

        $level = Level::find($payment->level_id);
        $levelName = $level ? $level->level_name : '-';
        return view('payments.finish', [
            'payment' => $payment,
            'levelName' => $levelName,
        ]);
    }


    public function notification(Request $request)
    {
        $this->setupMidtransConfig();

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
        } else if ($status == 'pending') {
            $payment->status = 'pending';
        }

        $payment->transaction_id = $notif->transaction_id;
        $payment->payment_type = $paymentType;
        $payment->payment_time = now();
        $payment->payment_details = json_decode(json_encode($notif), true);
        $payment->save();


        $payment->user->notify(new TransactionNotification($payment));

        if ($payment->status == 'success') {
            event(new PaymentSuccessful($payment));
        }

        return response()->json(['status' => 'success']);
    }

    public function grandLevelAAccess($payment)
    {
        try {
            $user = User::where('id', $payment->user_id)->first();
            $user->givePermissionTo('access_level_a');
            $user->revokePermissionTo('fresh_user');
        } catch (\Exception $e) {
            \Log::error('Error Granting Access Level A:', ['message' => $e->getMessage()]);
        }
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