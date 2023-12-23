<?php

namespace App\Imports;

use App\Models\KodePokja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodePokjaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new KodePokja([
            'kode_pokja' => $row['kode_pokja'],
            'keterangan' => $row['keterangan'],
            // Add more columns as needed
        ]);
    }
}
