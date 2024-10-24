<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'test user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


        $this->call([
            AdminRolePermissionSeeder::class,
            UserRolePermissionSeeder::class,
        ]);
    }
}
