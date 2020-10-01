<?php

namespace App\Listeners;

use App\Events\PropalsCreated;
use App\Notifications\PropalsCreatedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationPropalsCreated
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
     * @param  PropalsCreated  $event
     * @return void
     */
    public function handle(PropalsCreated $event)
    {
        $admin = User::find(1) ;
        Notification::send($admin ,
                            new PropalsCreatedNotification($event->conception)) ;

    }
}
