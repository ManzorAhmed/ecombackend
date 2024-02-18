<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->roles->flatMap(function ($role) {
                        return $role->permissions;
                    })->contains($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });

        Blade::directive('can', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->can({$permission})) : ?>";
        });

        Blade::directive('endcan', function ($permission) {
            return "<?php endif; ?>";
        });

    }


}
