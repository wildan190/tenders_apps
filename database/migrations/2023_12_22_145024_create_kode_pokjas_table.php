<?php

// database/migrations/xxxx_xx_xx_create_kode_pokjas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodePokjasTable extends Migration
{
    public function up()
    {
        Schema::create('kode_pokjas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pokja');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kode_pokjas');
    }
}

