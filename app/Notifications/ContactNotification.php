<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    private $request;

    /**
     * Create a new notification instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pedido de contacto no website')
            ->greeting('Pedido de contacto no website')
            ->line('<p><strong>Nome: </strong>' . $this->request->name . '</p>')
            ->line('<p><strong>Email: </strong>' . $this->request->email . '</p>')
            ->line('<p><strong>País: </strong>' . $this->request->country . '</p>')
            ->line('<p><strong>Telefone: </strong>' . $this->request->phone . '</p>')
            ->line('<p><strong>Assunto: </strong>' . $this->request->subject . '</p>')
            ->line('<p><strong>Mensagem: </strong>' . $this->request->message . '</p>')
            ->salutation('SABV Automotive');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
