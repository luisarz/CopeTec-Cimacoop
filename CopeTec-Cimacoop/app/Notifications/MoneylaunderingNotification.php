<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MoneylaunderingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($credit)
    {
        $this->credit = $credit;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'numero_caja' => $this->credit->numero_caja,
            'monto_saldo' => $this->credit->monto_saldo,
            'justificante' => $this->credit->justificante,
            'comprobante' => $this->credit->comprobante,
            'cliente' => $this->credit->cliente->nombre,
            'cobrado_por' => $this->credit->cobrado_por,
            'codigo_credito' => $this->credit->codigo_credito,
            'id_caja' => $this->credit->id_caja
        ];
    }
}
