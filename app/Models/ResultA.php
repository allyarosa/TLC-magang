<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultA extends Model
{
    //
    protected $table = 'exams_a';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryA()
    {
        return $this->belongsTo(CategoryA::class);
    }
}
