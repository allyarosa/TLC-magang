<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'level_id',
        'amount',
        'status',
        'snap_token',
        'transaction_id',
        'payment_type',
        'payment_time',
        'payment_details',
        'payment_method',
        'transfer_proof',
        'ig_follow_proof',
        'confirmed_at',
        'confirmed_by',
        'mode',
        'selected_categories',
        'voucher_id',
        'original_amount',
        'discount_amount',
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'payment_time' => 'datetime',
        'confirmed_at' => 'datetime',
        'payment_details' => 'array',
        'selected_categories' => 'array',
    ];

    /** True jika pembayaran ini adalah transfer bank manual */
    public function isManual(): bool
    {
        return $this->payment_method === 'manual';
    }

    /** True jika sudah dikonfirmasi admin */
    public function isConfirmed(): bool
    {
        return !is_null($this->confirmed_at);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function confirmedBy()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
