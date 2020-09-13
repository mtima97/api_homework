<?php

namespace App\Providers;

use App\Role;
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

        Gate::define('control-category', function ($user) {
            return $user->role_id == Role::ADMIN or $user->role_id == Role::MODERATOR;
        });

        Gate::define('control-product', function ($user) {
            return $user->role_id == Role::ADMIN or $user->role_id == Role::MODERATOR;
        });
    }
}
