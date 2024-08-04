<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $roles = ['admin', 'panitia', 'user'];
        foreach ($roles as $role) {
            Role::create([
                "role"  => $role
            ]);
        }

        User::create([
            "name"  => "admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin123"),
            "role_id" => 1
        ]);
        User::create([
            "name"  => "panitia",
            "email" => "panitia@panitia.com",
            "password" => bcrypt("panitia123"),
            "role_id" => 2
        ]);
    }
}
