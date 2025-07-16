<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminsProfile extends Model
{
    use HasFactory;

    protected $table = 'user_admins';

    protected $fillable = [
        'user_id',
        'profile_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
