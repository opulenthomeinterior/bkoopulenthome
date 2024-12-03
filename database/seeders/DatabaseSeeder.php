<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a super admin user
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'mubeenahmad1920@gmail.com',
            'password' => bcrypt('Test@123!'),
        ]);
        
        // Assign the "super admin" role to the user
        $user->assignRole('super-admin');

    }
}
