<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AsesiTable extends Component
{

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $users = User::role('asesi')
            ->with('userProfile')
            ->latest()
            ->paginate(10);

        return view('livewire.asesi-table', [
            'users' => $users,
        ]);
    }
}
