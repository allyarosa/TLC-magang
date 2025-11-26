<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use Queueable;

    public $message;
    public $url;
    public $icon;
    public $icon_bg_color;
    public $icon_text_color;

    /**
     * Create a new notification instance.
     */
    public function __construct($message, $url = null, $icon = null, $icon_bg_color = 'bg-blue-100', $icon_text_color = 'text-blue-600')
    {
        $this->message = $message;
        $this->url = $url;
        $this->icon = $icon;
        $this->icon_bg_color = $icon_bg_color;
        $this->icon_text_color = $icon_text_color;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'url' => $this->url,
            'icon' => $this->icon,
            'icon_bg_color' => $this->icon_bg_color,
            'icon_text_color' => $this->icon_text_color,
        ];
    }
}
