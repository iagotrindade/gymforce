<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendLoginToken extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $user;
    public $accessToken;

    public function __construct($user, $accessToken)
    {
        $this->user = $user;
        $this->accessToken = $accessToken;
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
        $url = url('/forgot_password');

        return (new MailMessage)
            ->subject('GYMFORCE - Nova Tentativa de acesso')
            ->greeting('Olá '.$this->user->name.'!')
            ->line('Nós detectamos uma nova tentativa de Login em sua conta GYMFORCE!')
            ->line('Utilize o código '.$this->accessToken.' para realizar o acesso.')
            ->line('Esse código irá expirar em 15 (quinze) minutos.')
            ->line('Caso não seja você que está tentando acessar sua conta, recomendamos alterar imediatamente a senha de seu email e informe a nossa administração.');
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
