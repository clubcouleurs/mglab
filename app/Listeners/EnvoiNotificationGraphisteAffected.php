<?php

namespace App\Listeners;

use App\Events\GraphisteAffected;
use App\Notifications\GraphisteAffectedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationGraphisteAffected
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
     * @param  GraphisteAffected  $event
     * @return void
     */
    public function handle(GraphisteAffected $event)
    {
        //$event->conception->graphiste->user()

        //request()->user()->notify(new GraphisteAffectedNotification($event->conception));
        Notification::send($event->conception->graphiste->user ,
                            new GraphisteAffectedNotification($event->conception)) ;
    }
}
