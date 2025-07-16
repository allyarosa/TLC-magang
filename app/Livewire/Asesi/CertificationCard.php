<?php

namespace App\Livewire\Asesi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CertificationCard extends Component
{

    public bool $hasAccessA = false;
    public bool $hasAccessB = false;
    public bool $hasAccessC = false;

    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;

        $this->hasAccessA = $user->hasPermissionTo('access_level_A');
        $this->hasAccessB = $user->hasPermissionTo('access_level_B');
        $this->hasAccessC = $user->hasPermissionTo('access_level_C');
    }
    
    public function render()
    {
        return view('livewire.asesi.certification-card');
    }
}
