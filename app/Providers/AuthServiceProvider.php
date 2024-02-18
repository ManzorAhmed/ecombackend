<?php

namespace App\Providers;

use App\Models\Agenda;
use App\Models\User;
use App\Policies\AgendaPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [


        User::class => UserPolicy::class, // Add this line to map User model to UserPolicy
        Agenda::class => AgendaPolicy::class, // Add this line to map User model to UserPolicy

    ];

    /**
     * Register any authentication / authorization services.
     */


    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            // Fetch the user's roles and permissions from the database
            $user->load('roles.permissions');

            // Check if the user has the required permission for the ability
            foreach ($user->roles as $role) {
                foreach ($role->permissions as $permission) {
                    if ($permission->name === $ability) {
                        return true; // User has the required permission
                    }
                }
            }

            return null; // Continue to normal gate checks
        });

    }

}
