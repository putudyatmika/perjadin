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
        $this->registerPolicies();

        Gate::define('isSuperAdmin', function ($user) {
            return $user->user_level == 5;
        });

        Gate::define('isAdmin', function ($user) {
            return $user->user_level == 4;
        });
        Gate::define('isPengelola', function ($user) {
            return $user->user_level == 3;
        });
        Gate::define('isOperator', function ($user) {
            return $user->user_level == 2;
        });
        Gate::define('isDemo', function ($user) {
            return $user->user_level == 1;
        });

        Gate::define('isKPA', function ($user) {
            return $user->pengelola == 3;
        });
        Gate::define('isPPK', function ($user) {
            return $user->pengelola == 2;
        });
        Gate::define('isKabid', function ($user) {
            return $user->pengelola == 1;
        });
        Gate::define('isKeuangan', function ($user) {
            return $user->pengelola == 4;
        });
        Gate::define('isOperatorPengelola', function ($user) {
            return $user->pengelola == 0;
        });
        Gate::define('isAdminPengelola', function ($user) {
            return $user->pengelola == 5;
        });
    }
}
