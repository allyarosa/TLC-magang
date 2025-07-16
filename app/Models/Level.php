<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //

    protected $table = 'levels';

    protected $fillable = [
        'level_name',
        'price',
        'discount',
        'final_price',
        'promo_code',
        'image'
    ];

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
