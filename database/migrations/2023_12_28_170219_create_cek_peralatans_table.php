<?php

// database/migrations/[timestamp]_create_cek_peralatans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekPeralatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cek_peralatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_pokja')->constrained('kode_pokjas'); // Ganti sesuai nama tabel yang sesuai
            $table->string('nama_paket');
            $table->string('tahun_anggaran');
            $table->string('pemenang');
            $table->string('spmk');
            $table->string('peralatan_syarat');
            $table->string('peralatan_ditawarkan');
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
        Schema::dropIfExists('cek_peralatans');
    }
}
