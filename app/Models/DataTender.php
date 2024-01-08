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
        'tahun',
    ];

    public function pokjas()
    {
        return $this->belongsToMany(Pokja::class, 'data_tender_pokja', 'data_tender_id', 'pokja_id');
    }

    // Relationship with KodePokja
    public function kodePokja()
    {
        return $this->belongsTo(KodePokja::class, 'kode_pokja');
    }
}
