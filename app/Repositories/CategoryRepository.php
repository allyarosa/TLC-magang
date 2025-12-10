<?php
namespace App\Repositories;

use App\Models\CategoryA;

class CategoryRepository {
    public function getCategoryAPassingScore() {
        return CategoryA::first()?->passing_score;
    }
}   