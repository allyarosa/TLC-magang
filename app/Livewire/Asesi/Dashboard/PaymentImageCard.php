<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class PaymentImageCard extends Component
{
    public string $image;
    public string $alt = '';
    public string $gradientColor = '';

    public function mount($image, $alt = 'Payment Image', $gradientColor = 'from-blue-200')
    {
        $this->image = $image;
        $this->alt = $alt;
        $this->gradientColor = $gradientColor;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.payment-image-card');
    }
}
