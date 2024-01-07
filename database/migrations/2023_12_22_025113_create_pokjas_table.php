<?php

// database/migrations/[timestamp]_create_pokjas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokjasTable extends Migration
{
    public function up()
    {
        Schema::create('pokjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('golongan');
            $table->string('nik');
            //$table->string('npwp');
            $table->string('email');
            $table->string('telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokjas');
    }
}
