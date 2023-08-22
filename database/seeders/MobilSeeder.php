<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Mobil::factory()->create([
            'kode_mobil' => 'MBL-001',
            'no_polisi' => 'B 1234 ABC',
            'harga_sewa' => '100000',
            'kapasitas' => '4',
            'gambar_mobil' => 'mobil1.jpg',
            'status' => 'Tersedia',
            'merek_id' => '1',
            'bahan_bakar_id' => '1',
            'tipe_mobil_id' => '1',
        ]);
    }
}
