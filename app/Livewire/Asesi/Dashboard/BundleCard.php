<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class BundleCard extends Component
{
    public $levels;

    public function mount($levels)
    {
        $this->levels = $levels;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.bundle-card');
    }
}
