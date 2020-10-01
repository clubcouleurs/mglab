<?php

namespace App\Listeners;

use App\Events\ChoixFaitModificationReceived;
use App\Notifications\ChoixFaitModificationReceivedNotification;
use App\Notifications\ChoixFaitModificationReceivedNotificationToGraphiste;
use App\Notifications\ModificationReceivedNotification;
use App\Notifications\ModificationReceivedNotificationToGraphiste;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationChoixFaitModificationReceived
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
     * @param  ChoixFaitModificationReceived  $event
     * @return void
     */
    public function handle(ChoixFaitModificationReceived $event)
    {
        if ($event->conception->status->id < 8 )
        {
            $admin = User::find(1) ;
            Notification::send($admin ,
                            new ChoixFaitModificationReceivedNotification($event->conception)) ;
            Notification::send($event->conception->graphiste->user ,
                            new ChoixFaitModificationReceivedNotificationToGraphiste($event->conception)) ;
        }
        else
        {
            $admin = User::find(1) ;
            Notification::send($admin ,
                            new ModificationReceivedNotification($event->conception)) ;
            Notification::send($event->conception->graphiste->user ,
                            new ModificationReceivedNotificationToGraphiste($event->conception)) ;
        }

    }
}
