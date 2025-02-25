<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerificarEmailNotification extends Notification
{

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static $createUrlCallback;


    public static $toMailCallback;


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return $this->buildMailMessage($verificationUrl);
    }

    // Metodo que constroi e enviar email de confirmação de Email
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Verifique o endereço de e-mail')
            ->greeting('Olá '.$this->name)
            ->line('Clique no botão abaixo para verificar o seu endereço de e-mail.')
            ->action('Verifique o endereço de e-mail', $url)
            ->line('Se você não criou uma conta, nenhuma ação adicional é necessária');
    }


    protected function verificationUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable);
        }

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }


    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }


    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}

