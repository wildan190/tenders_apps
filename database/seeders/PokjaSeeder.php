<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PokjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed multiple Pokja records using Faker
        for ($i = 0; $i < 10; $i++) {
            DB::table('pokjas')->insert([
                'nama' => $faker->name,
                'jabatan' => $faker->jobTitle,
                'golongan' => $faker->randomElement(['A', 'B', 'C']),
                'nik' => $faker->unique()->randomNumber(8),
                'email' => $faker->unique()->safeEmail,
                'telepon' => $faker->phoneNumber,
            ]);
        }
    }
}
