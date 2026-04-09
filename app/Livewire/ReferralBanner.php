<?php

namespace App\Livewire;

use Livewire\Component;

class ReferralBanner extends Component
{
    public $title = 'Rekomendasikan perusahaan dapatkan reward hingga 20 juta rupiah';
    public $buttonText = 'Ikuti Program Referral';
    public $link;

    public function mount()
    {
        $this->link = route('register');
    }

    public function render()
    {
        return view('livewire.referral-banner');
    }
}
