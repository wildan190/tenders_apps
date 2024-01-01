<?php

// app/Models/DataSuratKeputusan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuratKeputusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_tender_id',
        'cek_personil_id',
        'kode_pokja_id',
        'nomor_sk',
        'tahun',
        'nama_pembuat_komitmen',
        'nomor_surat',
        'satuan_kerja',
        'tanggal_terbit',
        'nama_personil',
        'nip_personil',
        'nama_paket',
        'pagu',
    ];

    public function dataTender()
    {
        return $this->belongsTo(DataTender::class);
    }

    public function cekPersonil()
    {
        return $this->belongsTo(CekPersonil::class);
    }

    public function kodePokja()
    {
        return $this->belongsTo(KodePokja::class);
    }
}
