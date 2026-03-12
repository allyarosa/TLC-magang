<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class BreadcrumbNav extends Component
{
    public string $label = '';
    public string $route = '';
    public function render()
    {
        return view('livewire.admin.breadcrumb-nav');
    }
}
