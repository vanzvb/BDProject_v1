<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the roles and their respective permissions
        $roles = ['Admin', 'Nurse', 'Donor'];
        $actions = ['view', 'add', 'edit', 'delete'];

        // Generate the permissions for each role and action
        foreach ($roles as $role) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "{$role}-{$action}"]);
            }
        }

        // Create roles and assign permissions
        foreach ($roles as $role) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $permissions = Permission::where('name', 'LIKE', "{$role}-%")->get();
            $roleInstance->syncPermissions($permissions);
        }
    }
}
