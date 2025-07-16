<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoryA;
use App\Models\QuestionA;

class CategoriesA extends Component
{
    public function render()
    {
        $categories = CategoryA::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionA::where('category_a_id', $category->id)->count();
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'banner_img' => $category->banner_img ?? 'blankCategories.jpg',
                'time_limit' => $category->time_limit?? 'null, data not found',
                'is_locked' => $category->is_locked?? false,
                // 'kkm' => $category->kkm?? 'null, data not found',
                'question_count' => $count ?? 'null, data not found'
            ];
        });
        return view('livewire.categories-a', [
            'categoriesA' => $categoriesWithCount,
        ]);
    }

    public $activeCategoryId = null;

    public function openModal($id)
    {
        $this->activeCategoryId = $id;
    }

    public function closeModal()
    {
        $this->activeCategoryId = null;
    }


}
