<?php

// app/Models/CekPeralatan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekPeralatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pokja',
        'nama_paket',
        'tahun_anggaran',
        'pemenang',
        'spmk',
        'spmk_selesai',
        'peralatan_syarat',
        'peralatan_ditawarkan',
    ];

    // Relasi dengan model KodePokja
    public function kodePokja()
    {
        return $this->belongsTo(KodePokja::class, 'kode_pokja');
    }

    // Relasi dengan model DataTender
    public function dataTender()
    {
        return $this->belongsTo(DataTender::class, 'nama_paket', 'nama_paket');
    }
}
