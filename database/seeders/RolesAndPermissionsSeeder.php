<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Ruxsatlarni yaratish
        $permissions = [
            ['name' => 'permission.show', 'title' => 'Ruxsatlarni ko`rish', 'guard_name' => 'web'],
            ['name' => 'permission.edit', 'title' => 'Ruxsatlarni o`zgartirish', 'guard_name' => 'web'],
            ['name' => 'permission.add', 'title' => 'Yangi ruxsat qo`shish', 'guard_name' => 'web'],
            ['name' => 'permission.delete', 'title' => 'Ruxsatlarni o`chirish', 'guard_name' => 'web'],

            ['name' => 'roles.show', 'title' => 'Rollarni ko`rish', 'guard_name' => 'web'],
            ['name' => 'roles.edit', 'title' => 'Rollarni o`zgartirish', 'guard_name' => 'web'],
            ['name' => 'roles.add', 'title' => 'Rollar qo`shish', 'guard_name' => 'web'],
            ['name' => 'roles.delete', 'title' => 'Rollarni o`chirish', 'guard_name' => 'web'],

            ['name' => 'user.show', 'title' => 'Userlarni ko`rish', 'guard_name' => 'web'],
            ['name' => 'user.edit', 'title' => 'Userlarni o`zgartirish', 'guard_name' => 'web'],
            ['name' => 'user.add', 'title' => 'Yangi Userlarni qo`shish', 'guard_name' => 'web'],
            ['name' => 'user.delete', 'title' => 'Userlarni o`chirish', 'guard_name' => 'web'],

            ['name' => 'api-user.add', 'title' => 'ApiUser Add', 'guard_name' => 'web'],
            ['name' => 'api-user.view', 'title' => 'ApiUser View', 'guard_name' => 'web'],
            ['name' => 'api-user.edit', 'title' => 'ApiUser Edit', 'guard_name' => 'web'],
            ['name' => 'api-user-passport.view', 'title' => 'ApiUser Password view', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['title' => $permission['title'], 'guard_name' => $permission['guard_name']]
            );
        }

        // Rollarni yaratish
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Super Admin roliga barcha ruxsatlarni berish
        $superAdminRole->syncPermissions(Permission::all());

        // Admin roliga muayyan ruxsatlarni berish
        $adminRole->syncPermissions([
            'permission.show', 'permission.edit', 'permission.add', 'permission.delete',
            'roles.show', 'roles.edit', 'roles.add', 'roles.delete',
            'user.show', 'user.edit'
        ]);

        // User roliga ma'lum ruxsatlarni berish
        $userRole->syncPermissions(['user.show']);
    }
}
