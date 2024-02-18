<?php
// app/Traits/HasRolesAndPermissions.php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function hasRole($role)
    {
        return $this->roles->contains(function ($roleModel) use ($role) {
            return $roleModel->name === $role || $roleModel->slug === $role;
        });
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains(function ($permissionModel) use ($permission) {
            return $permissionModel->name === $permission || $permissionModel->slug === $permission;
        });
    }


}
