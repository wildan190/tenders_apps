<?php

// app/Models/SuratPenyampaian.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPenyampaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_tender',
        'nomor_surat_penyampaian',
        'tahun',
        'sifat',
        'destinasi_kepada',
        'lampiran',
        'perihal',
        //'ppk',
        'kepala_balai',
        'nip',
        'tanggal_surat',
        'tanggal_diterima',
    ];

    public function dataTender()
    {
        return $this->belongsTo(DataTender::class, 'kd_tender', 'id');
    }
}
