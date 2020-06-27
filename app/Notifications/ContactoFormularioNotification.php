<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactoFormularioNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $msg;
    public $sender;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($msg, $email)
    {
        $this->msg = $msg;
        $this->sender = User::where('email', $email)->first();
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
                    ->line('Nuevo mensaje recibido de ' . $this->sender->name . ' ' . $this->sender->surname . ' DNI: ' . $this->sender->dni)
                    ->line('Responder a: ' . $this->sender->email)
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
