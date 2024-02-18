<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRolesAndPermissions;

// Import the trait


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions;

    // Make sure this line is present

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDynamicRoleName()
    {
        // Retrieve the dynamic role name based on your logic
        // For example, you could get the first assigned role
        $role = $this->roles->first();

        return $role ? $role->name : null;
    }

    public function getDynamicPermissionName()
    {
        // Retrieve the dynamic permission name based on your logic
        // For example, you could get the first assigned permission
        $permission = $this->permissions->first();

        return $permission ? $permission->name : null;
    }

}
