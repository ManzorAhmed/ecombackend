<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DynamicRolePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $user = Auth::user();

            // Retrieve roles and permissions associated with the user from the database
            $roles = $user->roles->pluck('name')->toArray();
            $permissions = $user->permissions->pluck('name')->toArray();

            // Combine roles and permissions into a single array
            $rolesOrPermissions = array_merge($roles, $permissions);

            // Apply the role_or_permission middleware dynamically
            $request->route()->middleware(['dynamic_role_permission:' . implode(',', $rolesOrPermissions)]);
        }


        return $next($request);
    }

}

