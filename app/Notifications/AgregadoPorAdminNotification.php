<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class AgregadoPorAdminNotification extends Notification
{
    public function __construct($name)
    {
        $this->name = $name; //El nombre recibido por parametro. Lo seteamos como $this->name para usarlo en el mail. https://stackoverflow.com/questions/40703804/laravel-5-3-how-to-show-username-in-notifications-email
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
            ->subject($this->name . ', estás a un paso de armar tu tribu.')
            ->greeting('Bienvenid@ a la plataforma virtual de la SEJU.')
            ->line('Hola ' . $this->name . '.')
            ->line('Tus datos han sido verificados y ya podés agregar personas a tu tribu, sólo falta que confirmés tu cuenta haciendo click en el siguiente botón.')
            ->line('Usá tu mail y DNI como contraseña para poder ingresar.')
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
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
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
