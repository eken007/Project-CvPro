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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('manage-users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('entreprise-admin', function ($user) {
            return $user->hasAnyRole(['entreprise','admin']);
        });
        Gate::define('entreprise', function ($user) {
            return $user->hasAnyRole(['entreprise']);
        });

        Gate::define('employee-admin', function ($user) {
            return $user->hasAnyRole(['employee','admin']);
        });

        Gate::define('employee', function ($user) {
            return $user->hasAnyRole(['employee']);
        });


        Gate::define('edit-users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }
}
