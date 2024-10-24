<?php

namespace Database\Seeders;

use App\Helpers\PermissionHelper;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use \Spatie\Permission\Models\Permission;


class AdminRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permission categories and their permissions
        $categoriesWithPermissions = PermissionHelper::getCategoriesWithPermissions();

        // Create or retrieve the 'admin' role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create permissions in the database
        foreach ($categoriesWithPermissions as $permissions) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        }

        // creating admin role
        $adminRole = Role::firstOrCreate(['name'=>'admin']);
        // assigning all permissions in permission table to admin
        $adminRole->syncPermissions(Permission::all());

        $adminEmail = 'admin@gmail.com';
        $adminUser = User::where('email', $adminEmail)->first();
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
            $this->command->info("Admin role assigned to user with email: {$adminEmail}");
        } else {
            $this->command->error("User with email {$adminEmail} does not exist.");
        }
    }
}
