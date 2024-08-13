<?php

namespace Database\Seeders;

use App\Http\Controllers\ClassificationController;
use App\Models\Classification;
use App\Models\Role;
use App\Models\Student;
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

        for ($i = 0; $i < 50; $i++) {
            $student = Student::factory()->create();

            $controller = app(ClassificationController::class);

            $res = $controller->getClassification($student, true);

            Classification::create([
                "student_id" => $student->id,
                "result" => $res
            ]);
        }
    }
}
