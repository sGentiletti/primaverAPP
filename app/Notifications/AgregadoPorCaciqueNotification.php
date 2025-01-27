<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class AgregadoPorCaciqueNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user; //Publico para que la vista (la notificación) pueda acceder a este recurso. Lo necesita al ser Queueable.

    public function __construct($id)
    {
        $this->user = User::find($id); //El nombre recibido por parametro. Lo seteamos como $this->name para usarlo en el mail. https://stackoverflow.com/questions/40703804/laravel-5-3-how-to-show-username-in-notifications-email
    }

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }
        
        return (new MailMessage)
            ->subject('Has sido registrado en una Tribu. Verifica tu correo')
            ->greeting('Hola, ' . $this->user->name . " " . $this->user->surname)
            ->line('Bienvenid@ a la plataforma virtual de la SEJU. Te han agregado a una tribu, ¡Que emoción! Para confirmar tu registro en la tribu, debés verificar tu cuenta haciendo click en el botón. De lo contrario no contarás como participante válido para la inscripción de la tribu.')
            ->line('Es importante que ingreses a la plataforma para que verifiques tus datos con tus propios ojos e informarle a tu cacique en caso de que haya algun error. Usá tu mail y DNI como contraseña para poder ingresar.')
            ->action('Verificar Correo', $verificationUrl)
            ->line('Si creés que se trata de un error, contactanos.');
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(10080), //Expira en 1 semana desde que se generó
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}