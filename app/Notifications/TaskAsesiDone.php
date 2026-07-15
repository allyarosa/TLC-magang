<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAsesiDone extends Notification
{
    use Queueable;

    protected $message;
    public function __construct($message)
    {
        $this->message = $message;
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
        $message = $this->message;
        return [
            'message' => $message,
            'url' => route('asesi.sertifikasi'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-4 w-4">
    <path fill-rule="evenodd" d="M2.25 12a9.75 9.75 0 1 1 19.5 0 9.75 9.75 0 0 1-19.5 0ZM12 8.25a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM11.25 11.25a.75.75 0 0 1 1.5 0v4.5a.75.75 0 0 1-1.5 0v-4.5Z" clip-rule="evenodd"/>
</svg>',
            'icon_bg_color' => 'bg-green-100',
            'icon_text_color' => 'text-green-600',
        ];
    }
}
