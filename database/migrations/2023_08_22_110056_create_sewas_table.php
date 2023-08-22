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
            $table->dateTime('tanggal_sewa');
            $table->dateTime('tanggal_kembali');
            $table->string('total_bayar');
            $table->string('no_ktp');
            $table->string('status');
            $table->foreignId('user_id');
            $table->foreignId('mobil_id');
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
