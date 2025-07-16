<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryB extends Model
{
    use HasFactory;
    protected $table = 'categories_b'; 

    protected $fillable = [
        'name',
        'description',
        'status',
        'image_url'
    ];



}