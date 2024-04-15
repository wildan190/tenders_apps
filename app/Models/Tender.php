<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'kodeTender',
        'tahun',
        'namaPaket',
        'catatanTimPelaksana',
        'usulan',
        'dataPpk',
        'dataPokja',
        'penawaranPeserta',
        'penawaranPesertaApendo',
        'beritaAcara',
        'sppbj',
        'data_tender_id', // relasi dengan model DataTender
    ];

    // Definisikan relasi dengan model DataTender
    public function dataTender()
    {
        return $this->belongsTo(DataTender::class, 'data_tender_id');
    }
}
