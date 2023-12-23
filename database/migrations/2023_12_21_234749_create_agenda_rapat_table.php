<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaRapatTable extends Migration
{
    public function up()
    {
        Schema::create('agenda_rapats', function (Blueprint $table) {
            $table->id();
            $table->string('email_peserta');
            $table->string('title');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agenda_rapats');
    }
}
