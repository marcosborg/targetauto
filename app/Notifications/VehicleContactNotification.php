<?php

namespace App\Notifications;

use App\Models\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VehicleContactNotification extends Notification
{
    use Queueable;

    private $request;
    private $vehicle;

    /**
     * Create a new notification instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->vehicle = Vehicle::find($request->vehicle_id);
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
            ->subject('Pedido de contacto para uma viatura')
            ->greeting('Pedido de contacto para ' . $this->vehicle->car_model->brand->name . ' ' . $this->vehicle->car_model->name . ' de ' . $this->vehicle->year->number . ' (ID: ' . $this->vehicle->id . ')')
            ->line('<p><strong>Nome: </strong>' . $this->request->name . '</p>')
            ->line('<p><strong>Email: </strong>' . $this->request->email . '</p>')
            ->line('<p><strong>Contacto: </strong>' . $this->request->phone . '</p>')
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
