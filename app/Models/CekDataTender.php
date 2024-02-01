<?php

// File: app/Models/CekDataTender.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CekDataTender extends Model
{
    use HasFactory;

    protected $fillable = ['cek_personil_id', 'data_tender_id', 'status',];

    public function cekPersonil()
    {
        return $this->belongsTo(CekPersonil::class);
    }

    public function dataTender()
{
    return $this->belongsTo(DataTender::class, 'data_tender_id');
}
    
    public function updateStatus()
    {
        $dataTender = $this->dataTender;

        // Menggunakan Carbon untuk manipulasi tanggal
        $now = Carbon::now();
        $tanggalPenetapan = Carbon::parse($dataTender->tanggal_penetapan);
        $tanggalKontrak = Carbon::parse($dataTender->tanggal_kontrak);

        // Logika untuk update status
        $status = null;
        if ($now->greaterThanOrEqualTo($tanggalKontrak->endOfDay())) {
            $status = 'SELESAI';
        } elseif ($now->greaterThanOrEqualTo($tanggalKontrak->startOfDay())) {
            $status = 'DIKERJAKAN';
        } elseif ($now->greaterThanOrEqualTo($tanggalPenetapan->startOfDay())) {
            $status = 'DITETAPKAN';
        }

        $this->update(['status' => $status]);
    }
}
