<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaRapat extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_peserta',
        'title',
        'tanggal',
        'waktu',
        'tempat',
        'deskripsi',
    ];
}
