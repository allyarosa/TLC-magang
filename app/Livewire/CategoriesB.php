<?php

namespace App\Livewire;

use App\Models\CategoryB;
use Livewire\Component;

class CategoriesB extends Component
{
    public function render()
    {
        $categories = CategoryB::all();
        
        return view('livewire.categories-b', [
            'categories' => CategoryB::all()
        ]);
    }
}