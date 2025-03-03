<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;

class PermissionPolicy
{
    /**
     * Foydalanuvchi barcha permissionlarni ko'rishi mumkinmi?
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('permission.view');
    }

    /**
     * Foydalanuvchi ma'lum bir permissionni ko'rishi mumkinmi?
     */
    public function view(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission.view');
    }

    /**
     * Foydalanuvchi permission qo'shishi mumkinmi?
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('permission.create');
    }

    /**
     * Foydalanuvchi permissionni yangilashi mumkinmi?
     */
    public function update(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission.edit');
    }

    /**
     * Foydalanuvchi permissionni o'chirishi mumkinmi?
     */
    public function delete(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission.destroy');
    }

    /**
     * Foydalanuvchi permissionni tiklashi mumkinmi?
     */
    public function restore(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission.restore');
    }

    /**
     * Foydalanuvchi permissionni butunlay o'chirishi mumkinmi?
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission.forceDelete');
    }
}

