<?php

namespace App\Livewire\Asesi\Dashboard;

use Livewire\Component;

class PriceItem extends Component
{
    public string $price = '';
    public string $textColor = 'text-gray-700';
    public int $discount = 0;

    public function mount(
        string $price,
        string $textColor,
        int $discount = 0
        ) {
        $this->price = $price;
        $this->textColor = $textColor;
        $this->discount = $discount;
    }
    public function render()
    {
        return view('livewire.asesi.dashboard.price-item');
    }
}
