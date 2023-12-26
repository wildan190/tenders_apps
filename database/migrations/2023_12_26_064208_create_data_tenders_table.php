<?php

// database/migrations/xxxx_xx_xx_create_data_tenders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTendersTable extends Migration
{
    public function up()
    {
        Schema::create('data_tenders', function (Blueprint $table) {
            $table->id();
            $table->string('kd_tender');
            $table->string('nama_paket');
            $table->string('link_web')->nullable();
            $table->foreignId('kode_pokja')->constrained('kode_pokjas');
            $table->decimal('pagu', 15, 2);
            $table->decimal('hps', 15, 2);
            $table->string('satuan_kerja');
            $table->string('ppk');
            $table->string('nama_instansi');
            $table->decimal('nilai_penawaran', 15, 2);
            $table->date('tanggal_penetapan');
            $table->decimal('nilai_kontrak', 15, 2);
            $table->date('tanggal_kontrak');
            $table->string('waktu_pelaksanaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_tenders');
    }
}
