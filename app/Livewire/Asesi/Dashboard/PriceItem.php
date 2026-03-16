<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class PriceItem extends Component
{
    public string $price = '';
    public string $textColor = 'text-gray-700';

    public function mount(
        string $price,
        string $textColor
        ) {
        $this->price;
        $this->textColor;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.price-item');
    }
}
