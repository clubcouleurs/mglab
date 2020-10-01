<?php

namespace App\Listeners;

use App\Events\ModificationValidated;
use App\Notifications\ModificationValidatedNotification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationModificationValidated
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
     * @param  ModificationValidated  $event
     * @return void
     */
    public function handle(ModificationValidated $event)
    {
        Notification::send($event->conception->user,
                            new ModificationValidatedNotification($event->conception)) ;
    }
}
