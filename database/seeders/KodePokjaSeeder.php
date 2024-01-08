<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KodePokjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed multiple KodePokja records using Faker
        for ($i = 0; $i < 5; $i++) {
            DB::table('kode_pokjas')->insert([
                'kode_pokja' => $faker->unique()->randomNumber(4),
                'keterangan' => $faker->sentence,
            ]);
        }
    }
}
