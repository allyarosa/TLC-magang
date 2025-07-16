<?php

namespace App\Livewire\Payments;

use Livewire\Component;

class PromoModal extends Component
{

      public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    
    public function render()
    {
        return view('livewire.payments.promo-modal');
    }
}
