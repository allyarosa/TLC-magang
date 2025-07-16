<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryA extends Model
{
    protected $table = 'categories_a';
    protected $fillable = [
        'name',
        'description',
        'banner_img',
        'time_limit',
        'is_locked',
        'passing_score'
    ];

    public function questionsA(){
        return $this->hasMany(QuestionA::class,'category_a_id' );
    }

    // public function questions(){
    //     return $this->hasMany(Questions::class, 'category_id');
    // }
}
