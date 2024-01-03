<?php

// File: app/Models/DataSuratKeputusan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuratKeputusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_tender',
        'nomor_sk',
        'nomor_surat',
        'tahun',
        'tanggal_terbit',
        'pembuat_komitmen',
    ];

    // Relationship with DataTender
    public function dataTender()
    {
        return $this->belongsTo(DataTender::class, 'kd_tender');
    }

    // Relationship with CekPersonil
    public function namaPersonil()
    {
        return $this->belongsTo(CekPersonil::class, 'id');
    }
}
