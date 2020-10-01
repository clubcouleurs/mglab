<?php

namespace App\Listeners;

use App\Events\ModificationApplied;
use App\Notifications\ModificationAppliedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiNotificationModificationApplied
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
     * @param  ModificationApplied  $event
     * @return void
     */
    public function handle(ModificationApplied $event)
    {
        $admin = User::find(1) ;
        Notification::send($admin ,
                            new ModificationAppliedNotification($event->conception)) ;

    }
}
