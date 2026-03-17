<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class PaymentCardHeader extends Component
{
    public string $label = '';
    public string $labelColor = 'text-gray-700';

    public string $titleColor = 'text-gray-700';
    public string $title = '';
    public string $subtitle = '';

    public function mount(string $label, string $title, string $subtitle, string $labelColor = 'text-gray-700', string $titleColor = 'text-gray-700') {
        $this->label = $label;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->labelColor = $labelColor;
        $this->titleColor = $titleColor;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.payment-card-header');
    }
}
