<?php

namespace App\Providers;

use App\Conception;
use App\Policies\ConceptionPolicy;
use App\Policies\PropalPolicy;
use App\Propal;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Conception::class => ConceptionPolicy::class,
        Propal::class => PropalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user, $permission)
        {   

            if ($user->permissions()->contains($permission))
            {
                return true ;
            }
            
        });
    }
}
