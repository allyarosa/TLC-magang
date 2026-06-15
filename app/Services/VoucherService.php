<?php

namespace App\Services;

use App\Models\Voucher;
use Exception;
use Illuminate\Support\Facades\DB;

class VoucherService
{
    /**
     * @param string $code
     * @return Voucher
     * @throws Exception
     */
    public function validateVoucher(string $code): Voucher
    {
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher) {
            throw new Exception('Kode voucher tidak ditemukan.');
        }

        if (!$voucher->isValid()) {
            throw new Exception('Kode voucher tidak aktif, kadaluarsa, atau telah melewati batas penggunaan.');
        }

        return $voucher;
    }

    /**
     * @param Voucher $voucher
     * @param float|int $originalAmount
     * @return float
     */
    public function calculateDiscount(Voucher $voucher, $originalAmount): float
    {
        if ($voucher->type === 'fully_funded') {
            return (float) $originalAmount; // The discount is the whole amount
        }

        if ($voucher->type === 'partial_funded') {
            return (float) ($originalAmount * 0.5); // Fixed 50% discount
        }

        if ($voucher->type === 'discount') {
            return (float) min($voucher->value, $originalAmount);
        }

        return 0;
    }

    /**
     * Memotong kuota menggunakan lockForUpdate agar thread-safe
     * @param int $voucherId
     * @throws Exception
     */
    public function incrementUsage(int $voucherId): void
    {
        DB::transaction(function () use ($voucherId) {
            $voucher = Voucher::lockForUpdate()->find($voucherId);
            if ($voucher && $voucher->max_uses !== null) {
                if ($voucher->uses >= $voucher->max_uses) {
                    throw new Exception('Kuota voucher telah habis.');
                }
            }
            if ($voucher) {
                $voucher->increment('uses');
            }
        });
    }

    /**
     * Mengembalikan kuota jika transaksi gagal/expire
     * @param int $voucherId
     */
    public function refundUsage(int $voucherId): void
    {
        DB::transaction(function () use ($voucherId) {
            $voucher = Voucher::lockForUpdate()->find($voucherId);
            if ($voucher && $voucher->uses > 0) {
                $voucher->decrement('uses');
            }
        });
    }

    public function generateCode(): string
    {
        return strtoupper(\Illuminate\Support\Str::random(8));
    }

    public function createVoucher(array $data, int $adminId): Voucher
    {
        if (empty($data['code'])) {
            $data['code'] = $this->generateCode();
        }

        $data['created_by'] = $adminId;

        return Voucher::create($data);
    }
}
