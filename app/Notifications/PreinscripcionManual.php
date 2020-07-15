<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PreinscripcionManual extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                        ->subject($notifiable['name'] . ', revisamos tu solicitud.')
                        ->greeting('Hola, ' . $notifiable['name'])
                        ->line('El departamento de Secretaría revisó tu solicitud y ha decidido preinscribirte pese a que quizás no cumplías con ciertos requisitos.')
                        ->line('¿Qué significa ésto? Significa que tenemos tus datos y el de los demás solicitantes para verificarlos. Recordá que todavía no sos un indio inscripto, pero este paso es necesario para serlo.')
                        ->line('Quedate atento a nuestras redes para cuando haya más información.');
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
