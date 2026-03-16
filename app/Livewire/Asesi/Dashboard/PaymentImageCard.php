<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class PaymentImageCard extends Component
{
    public string $image;
    public string $alt = '';

    public function mount($image, $alt = 'Payment Image')
    {
        $this->image = $image;
        $this->alt = $alt;

    }
    public function render()
    {
        return view('livewire.asesi.dashboard.payment-image-card');
    }
}
