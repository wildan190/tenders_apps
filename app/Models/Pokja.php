<?php

// app/Models/Pokja.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'golongan',
        'nik',
        'npwp',
        'email',
        'telepon',
    ];

    public function CekPersonil()
    {
        return $this->belongsToMany(CekPersonil::class, 'cek_personil_pokja');
    }
}

