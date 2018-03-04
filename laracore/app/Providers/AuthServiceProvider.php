<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function () {
            if (auth()->user()->is_super_admin) {
                
                return true;
            }
            Gate::define('test', function () {
                return auth()->user()->role == 'test';
                // return auth()->user()->hasRole('test');
            });
        });

        Gate::define('yes', function () {
            return auth()->user()->is_super_admin == '1';
        });
    }
}
