<?php

// app/Models/CekPersonil.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekPersonil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_personil',
        'jabatan_personil',
        'nik_personil',
        'npwp_personil',
        'email_personil',
        'telepon_personil',
    ];

    public function pokjas()
    {
        return $this->belongsToMany(Pokja::class, 'cek_personil_pokja', 'cek_personil_id', 'pokja_id');
    }

    // app/Models/CekPersonil.php

    public function dataSuratKeputusan()
    {
        return $this->hasOne(DataSuratKeputusan::class);
    }
}
