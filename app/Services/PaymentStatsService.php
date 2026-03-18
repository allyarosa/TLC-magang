<?php

namespace App\Services;

use App\Models\Payment;

class PaymentStatsService
{
    public function getStats(): array
    {
        try {
            return [
                'total_payments' => Payment::count(),
                'total_success' => Payment::where('status', 'success')->count(),
                'total_pending' => Payment::where('status', 'pending')->count(),
                'total_failed' => Payment::where('status', 'failed')->count(),
                'total_amount' => Payment::where('status', 'success')->sum('amount'),
                'today_payments' => Payment::whereDate('created_at', today())->count(),
                'today_amount' => Payment::where('status', 'success')
                    ->whereDate('created_at', today())
                    ->sum('amount'),
            ];
        } catch (\Exception $e) {
            return [
                'total_payments' => 0,
                'total_success' => 0,
                'total_pending' => 0,
                'total_failed' => 0,
                'total_amount' => 0,
                'today_payments' => 0,
                'today_amount' => 0,
            ];
        }
    }
}
