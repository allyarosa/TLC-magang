<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;

    protected $table = 'site_infos';

    protected $fillable = [
        'instagram',
        'linkedin',
        'facebook',
        'youtube',
        'whatsapp',
        'email',
        'address',
        'description',
        'payment_method',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'payment_instructions',
    ];

    /**
     * Cek apakah mode pembayaran aktif adalah manual bank transfer.
     */
    public function isManualPayment(): bool
    {
        return $this->payment_method === 'manual';
    }

    /**
     * Ambil setting pembayaran aktif dari singleton (cached per-request).
     */
    public static function getPaymentSettings(): self
    {
        return static::first() ?? new static(['payment_method' => 'midtrans']);
    }
}
