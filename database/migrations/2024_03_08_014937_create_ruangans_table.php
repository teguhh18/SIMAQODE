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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gedung_id');
            $table->string('nama_ruang');
            $table->string('slug')->unique();
            $table->string('lantai');
            $table->string('kapasitas');
            $table->string('tipe_ruangan');
            $table->string('kondisi_ruangan');
            $table->string('unit_kerja');
            $table->boolean('bisa_pinjam');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
