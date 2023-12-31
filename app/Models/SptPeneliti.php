<?php

// app/Models/SptPeneliti.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SptPeneliti extends Model
{
    use HasFactory;
    protected $fillable = ['kd_tender', 'nomor_spt', 'tahun', 'kepala_balai', 'nip', 'jabatan', 'tanggal_spt', 'anggota_peneliti', 'keterangan'];

    public function dataTender()
    {
        return $this->belongsTo(DataTender::class, 'kd_tender', 'kd_tender');
    }
}