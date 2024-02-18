<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class
  UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function create(User $user)
    {
        return Gate::allows('Admin', $user); // Check if the user has the 'admin' role
    }
    public function edit(User $user)
    {
        return Gate::allows('Admin', $user); // Check if the user has the 'admin' role
    }


}
