<?php

namespace App\Services;

use App\Events\PaymentSuccessful;
use App\Events\PaymentSuccessfulManual;
use App\Models\CategoryA;
use App\Models\Level;
use App\Models\Payment;
use App\Models\SiteInfo;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Exception;

class PaymentService
{
    protected VoucherService $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
        $this->setupMidtransConfig();
    }

    protected function setupMidtransConfig()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
    }

    /**
     * @throws Exception
     */
    public function calculateBaseAmount(string $mode, int $levelId, ?string $selectedCategories): array
    {
        $calculatedAmount = 0;
        $selectedCategoriesArray = [];

        if ($mode === 'bundle') {
            $level = Level::findOrFail($levelId);
            $calculatedAmount = $level->price ?? 150000;
        } else {
            if (!empty($selectedCategories)) {
                $selectedCategoriesArray = explode(',', $selectedCategories);
                $dbNames = array_map('strtoupper', $selectedCategoriesArray);
                $categories = CategoryA::whereIn('name', $dbNames)->get();
                $calculatedAmount = $categories->sum('price');
                
                if ($calculatedAmount <= 0) {
                    throw new Exception('Kategori tidak valid.');
                }
            } else {
                throw new Exception('Silakan pilih minimal satu kategori.');
            }
        }

        return [$calculatedAmount, $selectedCategoriesArray];
    }

    /**
     * Proses pembuatan pesanan baru (Checkout)
     */
    public function processCheckout(User $user, array $data, ?string $voucherCode)
    {
        $orderId = 'ORDER-' . time() . '-' . Str::random(5);
        $siteInfo = SiteInfo::getPaymentSettings();
        $paymentMode = $siteInfo->payment_method ?? 'midtrans';
        $isManual = ($paymentMode === 'manual');

        [$originalAmount, $selectedCategoriesArray] = $this->calculateBaseAmount($data['mode'], $data['level_id'], $data['selected_categories'] ?? null);
        
        $discountAmount = 0;
        $voucherId = null;

        if ($voucherCode) {
            $voucher = $this->voucherService->validateVoucher($voucherCode);
            $discountAmount = $this->voucherService->calculateDiscount($voucher, $originalAmount);
            $voucherId = $voucher->id;
        }

        $calculatedAmount = max(0, $originalAmount - $discountAmount);
        
        // 1. Jika Fully Funded (calculatedAmount == 0) -> Bypass Payment Gateway
        if ($calculatedAmount == 0 && $voucherId) {
            return $this->handleFullyFunded($user, $data, $orderId, $selectedCategoriesArray, $originalAmount, $discountAmount, $voucherId);
        }

        // 2. Transaksi Normal
        if ($isManual) {
            return $this->handleManualTransfer($user, $data, $orderId, $selectedCategoriesArray, $originalAmount, $discountAmount, $voucherId, $calculatedAmount);
        } else {
            return $this->handleMidtrans($user, $data, $orderId, $selectedCategoriesArray, $originalAmount, $discountAmount, $voucherId, $calculatedAmount);
        }
    }

    protected function handleFullyFunded(User $user, array $data, string $orderId, array $selectedCategoriesArray, float $originalAmount, float $discountAmount, int $voucherId)
    {
        // Increment voucher
        $this->voucherService->incrementUsage($voucherId);

        $payment = Payment::create([
            'user_id'             => $user->id,
            'order_id'            => $orderId,
            'level_id'            => $data['level_id'],
            'amount'              => 0,
            'original_amount'     => $originalAmount,
            'discount_amount'     => $discountAmount,
            'voucher_id'          => $voucherId,
            'mode'                => $data['mode'],
            'selected_categories' => $selectedCategoriesArray,
            'status'              => 'success',
            'payment_method'      => 'fully_funded',
            'payment_type'        => 'voucher',
            'payment_time'        => now(),
            'confirmed_at'        => now(),
        ]);

        $this->grantAsesiAccess($payment);
        $user->notify(new TransactionNotification($payment));

        return [
            'type' => 'success',
            'payment' => $payment,
            'message' => 'Voucher fully funded berhasil diaplikasikan. Akses kelas telah dibuka.'
        ];
    }

    protected function handleManualTransfer(User $user, array $data, string $orderId, array $selectedCategoriesArray, float $originalAmount, float $discountAmount, ?int $voucherId, float $calculatedAmount)
    {
        if ($voucherId) {
            $this->voucherService->incrementUsage($voucherId);
        }

        $payment = Payment::create([
            'user_id'             => $user->id,
            'order_id'            => $orderId,
            'level_id'            => $data['level_id'],
            'amount'              => $calculatedAmount,
            'original_amount'     => $originalAmount,
            'discount_amount'     => $discountAmount,
            'voucher_id'          => $voucherId,
            'mode'                => $data['mode'],
            'selected_categories' => $selectedCategoriesArray,
            'status'              => 'waiting_confirmation',
            'payment_method'      => 'manual',
            'transfer_proof'      => $data['proofPath'],
            'ig_follow_proof'     => $data['igProofPath'] ?? null,
        ]);

        $user->notify(new TransactionNotification($payment));

        return [
            'type' => 'manual',
            'payment' => $payment,
            'message' => 'Bukti transfer berhasil dikirim. Menunggu konfirmasi admin.'
        ];
    }

    protected function handleMidtrans(User $user, array $data, string $orderId, array $selectedCategoriesArray, float $originalAmount, float $discountAmount, ?int $voucherId, float $calculatedAmount)
    {
        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $calculatedAmount,
            ],
            'customer_details' => [
                'user_id'    => $user->id,
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

            if ($voucherId) {
                $this->voucherService->incrementUsage($voucherId);
            }

            $payment = Payment::create([
                'user_id'             => $user->id,
                'order_id'            => $orderId,
                'level_id'            => $data['level_id'],
                'amount'              => $calculatedAmount,
                'original_amount'     => $originalAmount,
                'discount_amount'     => $discountAmount,
                'voucher_id'          => $voucherId,
                'mode'                => $data['mode'],
                'selected_categories' => $selectedCategoriesArray,
                'snap_token'          => $snapToken,
                'status'              => 'pending',
                'payment_method'      => 'midtrans',
            ]);

            $user->notify(new TransactionNotification($payment));

            return [
                'type' => 'midtrans',
                'payment' => $payment
            ];
        } catch (Exception $e) {
            Log::error('Midtrans Error:', [
                'message'  => $e->getMessage(),
                'order_id' => $orderId,
            ]);
            throw $e;
        }
    }

    public function grantAsesiAccess(Payment $payment): void
    {
        if ($payment->mode === 'bundle') {
            event(new PaymentSuccessful($payment));
        } else {
            event(new PaymentSuccessfulManual($payment));
        }
    }

    public function regenerateSnapToken(Payment $payment): string
    {
        $this->setupMidtransConfig();
        $user = $payment->user;
        
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

        return Snap::getSnapToken($params);
    }
}
