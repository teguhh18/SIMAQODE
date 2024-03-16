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
        Schema::create('gedungs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gedung');
            $table->string('nama_gedung');
            $table->string('slug')->unique();
            $table->string('sumber_dana');
            $table->string('lokasi_kampus');
            $table->string('nilai_perolehan');
            $table->string('tahun_perolehan');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedungs');
    }
};
