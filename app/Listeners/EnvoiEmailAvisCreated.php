<?php

namespace App\Listeners;

use App\Events\AvisCreated;
use App\Notifications\EnvoiEmailAvisCreatedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class EnvoiEmailAvisCreated
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
     * @param  object  $event
     * @return void
     */
    public function handle(AvisCreated $event)
    {   
            $admin = User::find(1) ;
        Notification::send($admin ,
             new EnvoiEmailAvisCreatedNotification($event->avis)) ;
        
        Notification::send($event->avis->user,
            new EnvoiEmailAvisCreatedNotification($event->avis)) ;
    }
}
