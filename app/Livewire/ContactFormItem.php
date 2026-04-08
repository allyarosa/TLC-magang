<?php

namespace App\Livewire;

use App\Models\SiteInfo;
use Livewire\Component;

class ContactFormItem extends Component
{
    public function getSiteInfo() {
        $siteInfo = SiteInfo::select('whatsapp', 'email', 'address')->first();
        return $siteInfo;
    }
    public function render()
    {
        return view('livewire.contact-form-item', [
            'phoneNumber' => $this->getSiteInfo()->whatsapp ?? null,
            'email' => $this->getSiteInfo()->email ?? null,
            'address' => $this->getSiteInfo()->address ?? null,
        ]);
    }
}
