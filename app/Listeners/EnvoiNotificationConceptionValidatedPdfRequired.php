<?php

namespace App\Listeners;

use App\Events\ConceptionValidatedPdfRequired;
use App\Notifications\NotificationConceptionValidatedPdfRequired;
use App\Notifications\NotificationConceptionValidatedPdfRequiredToGraphiste;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationConceptionValidatedPdfRequired
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
     * @param  ConceptionValidatedPdfRequired  $event
     * @return void
     */
    public function handle(ConceptionValidatedPdfRequired $event)
    {
            $admin = User::find(1) ;
            Notification::send($admin ,
                            new NotificationConceptionValidatedPdfRequired($event->conception)) ;
            Notification::send($event->conception->graphiste->user ,
                            new NotificationConceptionValidatedPdfRequiredToGraphiste($event->conception)) ;

    }
}
