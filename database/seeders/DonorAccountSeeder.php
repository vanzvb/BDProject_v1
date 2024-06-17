<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DonorAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the donor user
        $user = User::create([
            'name' => 'Donor1',
            'email' => 'donor1@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // Retrieve the donor role
        $role = Role::where('name', 'Donor')->first();

        // Assign the donor role to the user if it exists
        if ($role) {
            $user->assignRole($role);
        }
    }
}
