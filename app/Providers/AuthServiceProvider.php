<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('act-product', function($user){
            return $user->hasAccess(['act-product']);
        });
        Gate::define('act-brand', function($user){
            return $user->hasAccess(['act-brand']);
        });
        Gate::define('act-staff', function($user){
            return $user->hasAccess(['act-staff']);
        });
        Gate::define('act-sell', function($user){
            return $user->hasAccess(['act-sell']);
        });
        Gate::define('act-order', function($user){
            return $user->hasAccess(['act-order']);
        });
        Gate::define('act-bill_sell', function($user){
            return $user->hasAccess(['act-bill_sell']);
        });
        Gate::define('act-warehouse', function($user){
            return $user->hasAccess(['act-warehouse']);
        });
        Gate::define('act-supplier', function($user){
            return $user->hasAccess(['act-supplier']);
        });
        Gate::define('act-votes_collect', function($user){
            return $user->hasAccess(['act-votes_collect']);
        });
        Gate::define('act-votes_pay', function($user){
            return $user->hasAccess(['act-votes_pay']);
        });
        Gate::define('act-funds', function($user){
            return $user->hasAccess(['act-funds']);
        });
        Gate::define('act-report', function($user){
            return $user->hasAccess(['act-report']);
        });
    }
}