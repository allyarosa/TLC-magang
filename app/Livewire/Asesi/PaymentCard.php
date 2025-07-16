<?php

namespace App\Livewire\Asesi;

use App\Models\Level;
use Livewire\Component;

class PaymentCard extends Component
{
    public function render()
    {
        $levels = Level::where('id', '!=', 4)->get();
        return view('livewire.asesi.payment-card', [
            'levels' => $levels,
        ]);
    }
}
