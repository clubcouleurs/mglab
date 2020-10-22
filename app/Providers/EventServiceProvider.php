<?php

namespace App\Providers;

use App\Events\DataConceptionReceived;
use App\Events\GraphisteAffected;
use App\Listeners\EnvoiNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
      /*  \App\Events\DataConceptionReceived::class => [
            \App\Listeners\EnvoiNotificationDataReceived::class,
        ],
        \App\Events\GraphisteAffected::class => [
            \App\Listeners\EnvoiNotificationGraphisteAffected::class,
        ],
        \App\Events\PropalsCreated::class => [
            \App\Listeners\EnvoiNotificationPropalsCreated::class,
        ],     
        \App\Events\PropalsValidated::class => [
            \App\Listeners\EnvoiNotificationPropalsValidated::class,
        ],
        \App\Events\ChoixFaitModificationReceived::class => [
            \App\Listeners\EnvoiNotificationChoixFaitModificationReceived::class,
        ], 
        \App\Events\ModificationApplied::class => [
            \App\Listeners\EnvoiNotificationModificationApplied::class,
        ],
        \App\Events\ModificationValidated::class => [
            \App\Listeners\EnvoiNotificationModificationValidated::class,
        ],
        \App\Events\ConceptionValidated::class => [
            \App\Listeners\EnvoiNotificationConceptionValidated::class,
        ],     
        \App\Events\ConceptionValidatedPdfRequired::class => [
            \App\Listeners\EnvoiNotificationConceptionValidatedPdfRequired::class,
        ],*/

    ];

    public function shouldDiscoverEvents()
    {
        return true ;
    }

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
