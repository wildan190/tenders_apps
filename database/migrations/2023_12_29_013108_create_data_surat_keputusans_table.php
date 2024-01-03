<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_surat_keputusans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_tender');
            $table->string('nomor_sk');
            $table->string('nomor_surat');
            $table->integer('tahun');
            $table->date('tanggal_terbit');
            $table->string('pembuat_komitmen');
            $table->timestamps();
        });

        Schema::table('data_surat_keputusans', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreign('kd_tender')->references('id')->on('data_tenders')->onDelete('cascade');
            //$table->foreign('pembuat_komitmen')->references('nama_personil')->on('cek_personils')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_surat_keputusans');
    }
};
