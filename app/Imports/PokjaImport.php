<?php

namespace App\Imports;

use App\Models\Pokja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PokjaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pokja([
            'nama' => $row['nama'],
            'jabatan' => $row['jabatan'],
            'golongan' => $row['golongan'],
            'nik' => $row['nik'],
            //'npwp' => $row['npwp'],
            'email' => $row['email'],
            'telepon' => $row['telepon'],
        ]);
    }
}
