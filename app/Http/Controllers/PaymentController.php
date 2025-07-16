<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use App\Models\Level;
use App\Models\Payment;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Events\PaymentSuccessful;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;

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
            default:
                return view('payments.create', ['level' => $level]);
        }
    }


    public function store(Request $request)
    {
        
        $user = User::with('userProfile')->where('id', Auth::id())->first();

        if (!$user->isProfileComplete()) {
            // Buat payment record terlebih dahulu DENGAN snap_token dummy
            $orderId = 'ORDER-' . time() . '-' . Str::random(5);
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'order_id' => $orderId,
                'level_id' => $request->level_id,
                'amount' => $request->amount,
                'snap_token' => '...', // Token dummy yang akan di-regenerate nanti
                'status' => 'pending',
            ]);

            // Store payment redirect information with proper structure
            session()->put('payment_redirect', [
                'route_name' => 'payments.checkout',
                'parameters' => ['id' => $payment->id],
                'route' => route('payments.checkout', ['id' => $payment->id]), // Fallback route
                'message' => 'Silakan lengkapi profil terlebih dahulu sebelum lanjut ke pembayaran.',
                'payment_id' => $payment->id, // Additional info for reference
                'level_id' => $request->level_id,
                'amount' => $request->amount
            ]);

            return redirect()->route('asesi.profile')
                ->with('warning', 'Lengkapi profil Anda terlebih dahulu untuk melanjutkan pembayaran')
                ->with('info', 'Data pembayaran telah disimpan dan akan diproses setelah profil lengkap.');
        }

        // Set up Midtrans configuration explicitly
        $this->setupMidtransConfig();

        // Validate request
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'level_id' => 'required|exists:levels,id'
        ]);

        // Generate unique order ID
        $orderId = 'ORDER-' . time() . '-' . Str::random(5);

        // Set up Midtrans transaction parameters
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $request->amount,
            ],
            'customer_details' => [
                'user_id' => Auth::id(),
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
            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Create payment record SETELAH mendapat snap token
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'order_id' => $orderId,
                'level_id' => $request->level_id,
                'amount' => $request->amount,
                'snap_token' => $snapToken, // Token yang valid
                'status' => 'pending',
            ]);

            // Redirect to checkout page
            return redirect()->route('payments.checkout', ['id' => $payment->id]);

        } catch (\Exception $e) {
            \Log::error('Midtrans Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'order_id' => $orderId,
                'amount' => $request->amount,
            ]);

            return redirect()->back()->with('error', 'Error creating payment: ' . $e->getMessage());
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
            return redirect()->route('payments.detail', $id)
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
            default:
                break;
        }
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
        $payment = Payment::findOrFail($id);

        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        return view('payments.detail', compact('payment'));
    }
}