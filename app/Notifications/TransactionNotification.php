<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionNotification extends Notification
{
    use Queueable;

    protected $transaction;

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
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
        $status = $this->transaction->status;
        $message = 'Transaksi Anda #' . $this->transaction->id;
        $icon_bg_color = 'bg-gray-100';
        $icon_text_color = 'text-gray-600';

        switch ($status) {
            case 'success':
                $message .= ' telah berhasil!';
                $icon_bg_color = 'bg-green-100';
                $icon_text_color = 'text-green-600';
                break;
            case 'pending':
                $message .= ' sedang diproses.';
                $icon_bg_color = 'bg-yellow-100';
                $icon_text_color = 'text-yellow-600';
                break;
            case 'failed':
                $message .= ' gagal.';
                $icon_bg_color = 'bg-red-100';
                $icon_text_color = 'text-red-600';
                break;
            default:
                $message .= ' statusnya ' . $status . '.';
                break;
        }

        return [
            'message' => $message,
            'url' => route('asesi.transaksi'),
            'icon' => '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>',
            'icon_bg_color' => $icon_bg_color,
            'icon_text_color' => $icon_text_color,
        ];
    }
}
