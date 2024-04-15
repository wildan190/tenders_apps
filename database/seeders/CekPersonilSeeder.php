<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CekPersonil;
use Faker\Factory as Faker;

class CekPersonilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Loop untuk menambahkan data palsu ke tabel cek_personils
        for ($i = 0; $i < 10; $i++) { // Ubah 10 menjadi jumlah data yang diinginkan
            CekPersonil::create([
                'nama_personil' => $faker->name,
                'jabatan_personil' => $faker->jobTitle,
                'nik_personil' => $faker->numerify('##########'), // 10 digit angka acak
                'npwp_personil' => $faker->numerify('###############'), // Format NPWP palsu
                'email_personil' => $faker->unique()->safeEmail,
                'telepon_personil' => $faker->phoneNumber,
            ]);
        }
    }
}
