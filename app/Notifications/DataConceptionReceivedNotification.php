<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DataConceptionReceivedNotification extends Notification
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
                            ->subject('Les données de la conception ' . $this->conception->type 
                                . ' du client ' . $this->conception->user->display_name 
                                . ' ont été bien reçu')
                            ->markdown('mail.admin.dataReceived', [
                                'sujet' => 'Données reçues',
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
                                'sujet' => 'Données reçues',
                                'conception' => $this->conception->type,
                                'conceptionId' => $this->conception->id,
                                'client' => $this->conception->user->display_name,
        ];
    }
}
