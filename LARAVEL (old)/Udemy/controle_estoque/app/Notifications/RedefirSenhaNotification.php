<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefirSenhaNotification extends Notification
{
    use Queueable;

    public function __construct($token,$email,$name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    //Metodo que constroi o corpo do email de recuperação de senha
    public function toMail($notifiable)
    {

        $url = "http://localhost:8000/password/reset/".$this->token.'?email='.$this->email;
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $saudação = "Olá ".$this->name;
        return (new MailMessage)
            ->subject('Atualização de Senha')
            ->greeting($saudação)
            ->line("Esqueceu a senha ? Sem problemas , vamos resolver isso !!!")
            ->action('Clique aqui para modificar sua senha ', $url)
            ->line('O link acima expira em '.$minutos.' minutos')
            ->line('Caso você não tenha requisitado a alteração de senha , então nenhuma ação é necessaria')
            ->salutation('Até breve');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
