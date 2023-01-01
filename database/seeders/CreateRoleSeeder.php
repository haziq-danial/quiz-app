<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // manage questions
        Permission::create(['name' => 'Manage questions']);
        Permission::create(['name' => 'View questions']);
        Permission::create(['name' => 'Create questions']);
        Permission::create(['name' => 'Edit questions']);
        Permission::create(['name' => 'Delete questions']);

        // manage user
        Permission::create(['name' => 'Manage users']);
        Permission::create(['name' => 'View users']);
        Permission::create(['name' => 'Create users']);
        Permission::create(['name' => 'Edit users']);
        Permission::create(['name' => 'Delete users']);

        // manage test
        Permission::create(['name' => 'Manage tests']);
        Permission::create(['name' => 'Answer tests']);
        Permission::create(['name' => 'View tests']);

        // manage group
        Permission::create(['name' => 'Manage Groups']);
        Permission::create(['name' => 'View groups']);
        Permission::create(['name' => 'Suggest groups']);

        // manage report
        Permission::create(['name' => 'Manage reports']);
        Permission::create(['name' => 'View reports']);

        // create role and assign

        // admin role
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('Manage questions');
        $admin->givePermissionTo('View questions');
        $admin->givePermissionTo('Create questions');
        $admin->givePermissionTo('Edit questions');
        $admin->givePermissionTo('Delete questions');

        $admin->givePermissionTo('Manage users');
        $admin->givePermissionTo('View users');
        $admin->givePermissionTo('Create users');
        $admin->givePermissionTo('Edit users');
        $admin->givePermissionTo('Delete users');

        $admin->givePermissionTo('Manage tests');
        $admin->givePermissionTo('View tests');

        $admin->givePermissionTo('Manage Groups');
        $admin->givePermissionTo('View groups');
        $admin->givePermissionTo('Suggest groups');

        $admin->givePermissionTo('Manage reports');
        $admin->givePermissionTo('View reports');

        // student role
        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('Manage tests');
        $student->givePermissionTo('Answer tests');
        $student->givePermissionTo('View tests');

        $student->givePermissionTo('Manage reports');
        $student->givePermissionTo('View reports');


        // counselor role
        $counselor = Role::create(['name' => 'counselor']);
        $counselor->givePermissionTo('Manage questions');
        $counselor->givePermissionTo('View questions');
        $counselor->givePermissionTo('Create questions');
        $counselor->givePermissionTo('Edit questions');
        $counselor->givePermissionTo('Delete questions');

        $counselor->givePermissionTo('Manage Groups');
        $counselor->givePermissionTo('View groups');
        $counselor->givePermissionTo('Suggest groups');

        $counselor->givePermissionTo('Manage tests');
        $counselor->givePermissionTo('View tests');

        $counselor->givePermissionTo('Manage reports');
        $counselor->givePermissionTo('View reports');
    }
}
