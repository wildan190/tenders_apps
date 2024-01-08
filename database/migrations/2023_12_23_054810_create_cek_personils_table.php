<?php

// database/migrations/2023_01_01_create_cek_personils_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekPersonilsTable extends Migration
{
    public function up()
    {
        Schema::create('cek_personils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_personil');
            $table->string('jabatan_personil');
            $table->string('nik_personil');
            $table->string('npwp_personil');
            $table->string('email_personil')->unique();
            $table->string('telepon_personil');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cek_personils');
    }
}
