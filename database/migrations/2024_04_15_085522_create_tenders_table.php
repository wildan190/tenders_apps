<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_tender_id')->nullable(); // Kolom untuk relasi dengan DataTender
            $table->foreign('data_tender_id')->references('id')->on('data_tenders')->onDelete('cascade');
            $table->string('kodeTender');
            $table->integer('tahun');
            $table->string('namaPaket');
            $table->text('catatanTimPelaksana')->nullable();
            $table->text('usulan')->nullable();
            $table->text('dataPpk')->nullable();
            $table->text('dataPokja')->nullable();
            $table->text('penawaranPeserta')->nullable();
            $table->text('penawaranPesertaApendo')->nullable();
            $table->text('beritaAcara')->nullable();
            $table->text('sppbj')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenders');
    }
}
