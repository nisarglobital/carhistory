<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creating admin role
        $userRole = Role::firstOrCreate(['name'=>'user']);

        // defining permission for admin
        $permissions = [
            'view user-panel',
            'view user-profile',        'reset user-password',      'delete user-account',   'freeze user-account',
            'list user-package',        'view user-package',
            'list user-transaction',    'create user-transaction',   'view user-transaction',
        ];

        // creating permission in DB
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // assigning all permissions in permission table to admin
        $userRole->syncPermissions($permissions);

        $userEmail = 'user@gmail.com';
        $endUser = User::where('email', $userEmail)->first();
        if ($endUser) {
            $endUser->assignRole($userRole);
            $this->command->info("Admin role assigned to user with email: {$userEmail}");
        } else {
            $this->command->error("User with email {$userEmail} does not exist.");
        }
    }
}
