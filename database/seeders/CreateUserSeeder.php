<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Counselor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = User::factory()->count(2)->admin()->create();
        $counselors = User::factory()->count(5)->counselor()->create();
        $students = User::factory()->count(5)->student()->create();

        foreach ($admins as $admin) {
            Admin::factory()->create([
                'UserID' => $admin->UserID,
                'staff_id' => $admin->id_no
            ]);
            $admin->assignRole('admin');
        }

        foreach ($counselors as $counselor) {
            Counselor::factory()->create([
                'UserID' => $counselor->UserID,
                'staff_id' => $counselor->id_no
            ]);
            $counselor->assignRole('counselor');
        }

        foreach ($students as $student) {
            Student::factory()->create([
                'UserID' => $student->UserID,
                'matric_id' => $student->id_no
            ]);
            $student->assignRole('student');
        }


    }
}
