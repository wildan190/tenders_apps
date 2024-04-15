<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment the lines below if you want to use the User factory
        // \App\Models\User::factory(10)->create();

        // Uncomment the lines below if you want to create a specific test user
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed your custom seeders
        $this->call([
            UserSeeder::class,
            PokjaSeeder::class,
            KodePokjaSeeder::class,
            CekPersonilSeeder::class,
            // Add more seeders if needed
        ]);
    }
}
