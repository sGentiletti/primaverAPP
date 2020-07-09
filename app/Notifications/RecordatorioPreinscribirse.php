<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecordatorioPreinscribirse extends Notification implements ShouldQueue
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
                        ->subject('¿Pasó algo, ' . $notifiable['name'] . '? | Recordatorio de Preinscripción Incompleta')
                        ->greeting('Hola, ' . $notifiable['name'])
                        ->line('Hemos notado que todavía no confirmaste tu preinscripción. ¿Está todo en orden?')
                        ->line('Te recordamos que el último paso es confirmar tu tribu. Si te olvidaste de confirmar la preinscripción, ingresá a tu cuenta y buscá el botón "Confirmar Preinscripción". Si no te aparece, verificá cumplir con los requisitos para conformar una tribu y si tenes problemas, podes contactarnos a través del formulario en nuestra página web.')
                        ->action('Quiero Preinscribirme', 'https://app.sejuturdera.com.ar/perfil');
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
