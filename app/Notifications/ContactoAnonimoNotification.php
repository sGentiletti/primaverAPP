<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactoAnonimoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $name;
    public $email;
    public $msg;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $email, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nuevo mensaje recibido. | SeJu Turdera')
                    ->greeting('Hola ' . $notifiable->name)
                    ->line('Nuevo mensaje recibido de ' . $this->name . ' (' . $this->email . ')')
                    ->line('Mensaje: ' . $this->msg)
                    ->line('Éste mensaje es automático y fue envíado a todos los administradores del sitio.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
