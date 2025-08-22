<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationModal extends Component
{
    public $notifications;
    public $unreadCount;

    protected $listeners = ['notification-new' => 'loadNotifications'];

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        $user = Auth::user();
        if ($user) {
            $this->notifications = $user->notifications()->latest()->take(10)->get();
            $this->unreadCount = $user->unreadNotifications->count();
        } else {
            $this->notifications = collect();

            $this->unreadCount = 0;
        }
    }                   

    public function markAsRead($notificationId)
    {
        $user = Auth::user();
        if ($user) {
            $notification = $user->notifications()->find($notificationId);
            if ($notification) {
                $notification->markAsRead();
                $this->loadNotifications();
                
                if (isset($notification->data['url'])) {
                    return redirect($notification->data['url']);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.notification-modal');
    }
}
