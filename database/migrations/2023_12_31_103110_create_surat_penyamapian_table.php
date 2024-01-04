<?php

// database/migrations/YYYY_MM_DD_create_surat_penyampaians_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_penyampaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kd_tender')->constrained('data_tenders'); // Assuming your data_tenders table name
            $table->string('nomor_surat_penyampaian');
            $table->year('tahun');
            $table->string('sifat');
            $table->text('destinasi_kepada');
            $table->string('lampiran');
            $table->string('perihal');
            //$table->string('ppk');
            $table->string('kepala_balai');
            $table->string('nip');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_penyampaians');
    }
};
