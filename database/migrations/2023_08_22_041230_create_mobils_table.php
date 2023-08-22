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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mobil', 10)->unique();
            $table->string('merk');
            $table->string('no_polisi', 10)->unique();
            $table->string('bahan_bakar');
            $table->string('harga_sewa');
            $table->string('kapasitas');
            $table->string('gambar_mobil');
            $table->string('status');
            $table->foreignId('tipe_mobil_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
