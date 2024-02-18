<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {

        $roles = $user->roles->pluck('name');
        $permissions = $user->permissions->pluck('name');
        $userName = strtolower($user->name);

        $roleRoutes = [
            'admin' => 'admin.dashboard', // Default dashboard route
            'author' => "{$userName}.dashboard",
            'moderator' => "{$userName}.dashboard",
            'User' => "{$userName}.dashboard",
            // Add more role mappings as needed
        ];

        // Determine the user's role and use the appropriate route
        $userRole = $roles->intersect(array_keys($roleRoutes))->first();

        if ($userRole) {
            return redirect()->route($roleRoutes[$userRole]);
        }

        // Default fallback route if no matching role is found
        return redirect()->route('admin.dashboard');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
