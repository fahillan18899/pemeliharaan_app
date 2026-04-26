<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('alat')->nullable();
            $table->text('sn')->nullable();
            $table->text('ruang')->nullable();
            $table->text('type')->nullable();
            $table->text('teknisi')->nullable();
            $table->text('no')->nullable();
            $table->date('waktu')->nullable();
            $table->text('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
