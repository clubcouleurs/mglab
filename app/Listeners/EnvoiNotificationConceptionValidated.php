<?php

namespace App\Listeners;

use App\Events\ConceptionValidated;
use App\Notifications\ConceptionValidatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationConceptionValidated
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
     * @param  ConceptionValidated  $event
     * @return void
     */
    public function handle(ConceptionValidated $event)
    {
        Notification::send($event->conception->user,
                            new ConceptionValidatedNotification($event->conception)) ;
    }
}
