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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sewa');
            $table->time('waktu_sewa');
            $table->date('tanggal_kembali');
            $table->time('waktu_kembali');
            $table->bigInteger('total_bayar');
            $table->string('no_ktp');
            $table->string('status');
            $table->foreignId('user_id');
            $table->foreignId('mobil_id');
            $table->foreignId('pembayaran_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
