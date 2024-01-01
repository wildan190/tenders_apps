<?php

// File: app/Models/CekDataTender.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekDataTender extends Model
{
    use HasFactory;
    
    protected $fillable = ['cek_personil_id', 'data_tender_id', 'status'];

    public function cekPersonil()
    {
        return $this->belongsTo(CekPersonil::class);
    }

    public function dataTender()
    {
        return $this->belongsTo(DataTender::class);
    }
}