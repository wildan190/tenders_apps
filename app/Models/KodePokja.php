<?php

// app/Models/KodePokja.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodePokja extends Model
{
    protected $fillable = ['kode_pokja', 'keterangan'];

    public function dataTenders()
    {
        return $this->hasMany(DataTender::class, 'kode_pokja');
    }
}
