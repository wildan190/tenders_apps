<?php

// database/migrations/xxxx_xx_xx_create_spt_penelitis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSptPenelitisTable extends Migration
{
    public function up()
    {
        Schema::create('spt_penelitis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_tender');
            $table->string('nomor_spt');
            $table->year('tahun');
            $table->string('kepala_balai');
            $table->string('nip');
            $table->string('jabatan');
            $table->date('tanggal_spt');
            $table->text('anggota_peneliti');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('kd_tender')->references('id')->on('data_tenders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('spt_penelitis');
    }
}
