<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed a sample admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // This will hash the password using bcrypt
        ]);

        // Seed a sample regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => md5('password'), // This will hash the password using MD5
        ]);
    }
}

