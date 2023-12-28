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
        Schema::create('cek_data_tenders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cek_personil_id')->constrained();
            $table->foreignId('data_tender_id')->constrained();
            $table->enum('status', ['DITETAPKAN', 'DIKERJAKAN', 'SELESAI'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cek_data_tenders');
    }
};
