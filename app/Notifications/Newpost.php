<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Newpost extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('SE A CREADO UN NUEVO POST')
                    ->greeting('hola')
                    ->line('Se a creado un nuevo post en su cuenta')
                    ->action('ir a ver la ultima publicacion', url('/'))
                    ->line('Thank you for using our application! ;)');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'notificacion',         
        ];
    }
}
