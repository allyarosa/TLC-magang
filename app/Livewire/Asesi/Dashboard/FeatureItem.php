<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class FeatureItem extends Component
{
    public $label = '';

    public function mount(string $label) {
        $this->label;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.feature-item');
    }
}
