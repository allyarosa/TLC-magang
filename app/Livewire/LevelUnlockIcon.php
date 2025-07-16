<?php

namespace App\Livewire;

use Livewire\Component;

class LevelUnlockIcon extends Component
{
    public $icon_color = 'text-green-500';

    public function mount(string $icon_color = null)
    {
        if($icon_color) $this->icon_color = $icon_color;
    }
    public function render()
    {
        return view('livewire.level-unlock-icon');
    }
}
