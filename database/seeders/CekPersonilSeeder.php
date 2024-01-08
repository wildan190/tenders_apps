<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CekPersonil;
use App\Models\Pokja;
use Faker\Factory as Faker;

class CekPersonilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed multiple CekPersonil records using Faker
        for ($i = 0; $i < 10; $i++) {
            $cekPersonil = CekPersonil::create([
                'nama_personil' => $faker->name,
                'jabatan_personil' => $faker->jobTitle,
                'nik_personil' => $faker->unique()->randomNumber(8),
                'npwp_personil' => $faker->unique()->randomNumber(10),
                'email_personil' => $faker->unique()->safeEmail,
                'telepon_personil' => $faker->phoneNumber,
            ]);

            // Attach some Pokja records to the CekPersonil using the pivot table
            $pokjas = Pokja::inRandomOrder()->limit(3)->get();
            $cekPersonil->pokjas()->attach($pokjas->pluck('id')->toArray());
        }
    }
}
