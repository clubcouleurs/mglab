<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class EnvoiEmailAvisCreatedNotification extends Notification
{
    use Queueable;
    public $avis;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($avis)
    {
       $this->avis = $avis ;
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
                $first_name = ($this->avis->first_name_client != Null) ? $this->avis->first_name_client : $this->avis->user->getFirstNameClient() ;
                
                return (new MailMessage)
                            ->subject('Salut '. $first_name . '!')
                            ->markdown('mail.avis.avis', [
                                'lien' => $this->avis->id,
                                'user' => $this->avis->user_id,
                                'first_name' => $first_name,
                            ]);



        /*    Mail::send('mail.avis.avis', ['user' => $first_name], function ($m) use ($user) {
                $m->from('hello@app.com', 'Your Application');
                $m->to($user->user_email, $user->nicename)->subject('Salut ' . $first_name);
            });


        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
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
