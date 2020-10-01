<?php

namespace App\Listeners;

use App\Events\PropalsValidated;
use App\Notifications\PropalsValidatedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationPropalsValidated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PropalsValidated  $event
     * @return void
     */
    public function handle(PropalsValidated $event)
    {
        //$admin = User::find(1) ;
        //dd($event->conception) ;
        Notification::send($event->conception->user,
                            new PropalsValidatedNotification($event->conception)) ;
    }
}
