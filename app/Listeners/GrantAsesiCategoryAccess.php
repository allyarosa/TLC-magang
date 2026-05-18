<?php

namespace App\Listeners;

use App\Events\PaymentSuccessfulManual;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GrantAsesiCategoryAccess
{
    public function __construct()
    {
        //
    }

    public function handle(PaymentSuccessfulManual $event): void
    {
        $payments = $event->payments;
        $user = $payments->user;
        $selectedCategory = $payments->selected_categories ?? [];

        if (!is_array($selectedCategory) || empty($selectedCategory))
            return;
        
        if (!$user)
            return;

        $selectedCategoryUpper = array_map('strtoupper', $selectedCategory);

        foreach ($selectedCategoryUpper as $category) {
            if (!$user->hasPermissionTo($category)) {
                $user->givePermissionTo($category);
            }
        }

        $user->revokePermissionTo('fresh_user');
    }
}
