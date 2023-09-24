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
            $table->string('plat_nomor', 15)->unique();
            $table->bigInteger('harga_sewa');
            $table->string('kapasitas');
            $table->string('gambar_mobil');
            $table->string('status');
            $table->foreignId('merek_id');
            $table->foreignId('bahan_bakar_id');
            $table->foreignId('type_mobil_id');
            $table->foreignId('user_id');
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
