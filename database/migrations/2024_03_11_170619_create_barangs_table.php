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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruangan_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('slug')->unique();
            $table->string('penanggung_jawab');
            $table->date('tanggal_beli');
            $table->string('nilai_perolehan');
            $table->string('kondisi_barang');
            $table->string('status');
            $table->string('foto')->nullable();
            $table->boolean('bisa_pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
