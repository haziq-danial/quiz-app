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

        // create role and assign
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('Manage questions');
        $admin->givePermissionTo('View questions');
        $admin->givePermissionTo('Create questions');
        $admin->givePermissionTo('Edit questions');
        $admin->givePermissionTo('Delete questions');

        $counselor = Role::create(['name' => 'counselor']);
        $counselor->givePermissionTo('Manage questions');
        $counselor->givePermissionTo('View questions');
        $counselor->givePermissionTo('Create questions');
        $counselor->givePermissionTo('Edit questions');
        $counselor->givePermissionTo('Delete questions');
    }
}
