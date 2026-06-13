<?php

namespace App\Livewire\Asesi\Dashboard;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionHistory extends Component
{
    public function render()
    {
        $transactions = Payment::with('level')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('livewire.asesi.dashboard.transaction-history', [
            'transactions' => $transactions,
        ]);
    }
}
