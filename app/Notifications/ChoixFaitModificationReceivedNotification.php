<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChoixFaitModificationReceivedNotification extends Notification
{
    use Queueable;

    public $conception ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($conception)
    {
        $this->conception = $conception ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                            ->subject('Le client ' . $this->conception->user->display_name
                                . ' a fait sont choix pour sa création ' . $this->conception->type 
                                )
                            ->markdown('mail.admin.choixFaitModificationReceived', [
                                'sujet' => 'Choix fait',
                                'conception' => $this->conception,
                                'client' => $this->conception->user->display_name,
                            ]);
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

                'sujet' => 'Choix fait',
                'conception' => $this->conception->type,
                'conceptionId' => $this->conception->id,
                'client' => $this->conception->user->display_name,
        ];
    }
}
