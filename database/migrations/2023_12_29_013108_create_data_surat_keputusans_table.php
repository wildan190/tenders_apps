<?php

// database/migrations/{timestamp}_create_data_surat_keputusans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSuratKeputusansTable extends Migration
{
    public function up()
    {
        Schema::create('data_surat_keputusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_tender_id')->constrained(); // Foreign key for DataTender
            $table->foreignId('cek_personil_id')->constrained(); // Foreign key for CekPersonil
            $table->foreignId('kode_pokja_id')->constrained(); // Foreign key for KodePokja
            $table->integer('nomor_sk');
            $table->year('tahun');
            $table->string('nama_pembuat_komitmen');
            $table->string('nomor_surat');
            $table->string('satuan_kerja');
            $table->date('tanggal_terbit');
            $table->string('nama_personil');
            $table->string('nip_personil');
            $table->string('nama_paket');
            $table->decimal('pagu', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_surat_keputusans');
    }
}

