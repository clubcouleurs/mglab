<?php

namespace App\Listeners;

use App\Conception;
use App\Events\DataConceptionReceived;
use App\Notifications\DataConceptionReceivedNotification;
use App\Notifications\DataConceptionReceivedNotificationToClient;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationDataReceived
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
     * @param  DataConceptionReceived  $event
     * @return void
     */
    public function handle(DataConceptionReceived $event)
    {
        $admin = User::find(1) ;
        Notification::send($admin ,
                            new DataConceptionReceivedNotification($event->conception)) ;
        
        Notification::send($event->conception->user,
                            new DataConceptionReceivedNotificationToClient($event->conception)) ;

       //return (new DataConceptionReceivedNotification($conception))
         //       ->toMail(request()->user());

       //Notification::send(request()->user(), new DataConceptionReceivedNotification()) ;
    }
}
