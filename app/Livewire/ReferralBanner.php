<?php

namespace App\Livewire;

use App\Models\ReferralBanner as ReferralBannerModel;
use Livewire\Component;

class ReferralBanner extends Component
{
    public $title = '';
    public $buttonText = '';
    public $link = '';
    public $hasActiveBanner = false;

    public function mount()
    {
        $banner = ReferralBannerModel::where('is_active', true)->first();

        if ($banner) {
            $this->hasActiveBanner = true;
            $this->title = $banner->title;
            $this->buttonText = $banner->button_text;
            $this->link = $banner->link;
        }
    }

    public function render()
    {
        return view('livewire.referral-banner');
    }
}
