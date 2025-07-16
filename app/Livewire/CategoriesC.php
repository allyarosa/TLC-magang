<?php

namespace App\Livewire;

use App\Models\CategoryC;
use Livewire\Component;

class CategoriesC extends Component
{
    public function render()
    {
        $categories = CategoryC::all();
        
        return view('livewire.categories-c', [
            'categories' => CategoryC::all()
        ]);
    }
}