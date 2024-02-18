<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleOrPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$rolesOrPermissions)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        foreach ($rolesOrPermissions as $roleOrPermission) {
            if ($user->hasRole($roleOrPermission) || $user->hasPermission($roleOrPermission)) {
                return $next($request);
            }
        }
        abort(403, 'You don\'t have permission to access this resource.');
    }

}
