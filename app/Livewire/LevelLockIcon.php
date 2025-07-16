<?php

namespace App\Livewire;

use Livewire\Component;

class LevelLockIcon extends Component
{
    public string $icon_color = 'text-red-500';

    public function mount(string $icon_color = null) {
        if($icon_color) {
            $this->icon_color = $icon_color; 
        }
    }
    
    public function render()
    {
        return view('livewire.level-lock-icon');
    }
}
