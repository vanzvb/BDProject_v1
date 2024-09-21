<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class NurseAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the nurse user
        $user = User::create([
            'first_name' => 'Joselita', 
            'middle_name' => 'Joana', 
            'last_name' => 'Dela Cruz',
            'email' => 'nurse1@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // Retrieve the nurse role
        $role = Role::where('name', 'Nurse')->first();

        // Assign the nurse role to the user if it exists
        if ($role) {
            $user->assignRole($role);
        }
    }
}
