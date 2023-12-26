<?php

// app/Models/DataTender.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTender extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_tender',
        'nama_paket',
        'link_web',
        'kode_pokja',
        'pagu',
        'hps',
        'satuan_kerja',
        'ppk',
        'nama_instansi',
        'nilai_penawaran',
        'tanggal_penetapan',
        'nilai_kontrak',
        'tanggal_kontrak',
        'waktu_pelaksanaan',
    ];

    // Relationship with KodePokja
    public function kodePokja()
    {
        return $this->belongsTo(KodePokja::class, 'kode_pokja');
    }
}
