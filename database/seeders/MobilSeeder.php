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
            'merk' => 'Toyota',
            'no_polisi' => 'B 1234 ABC',
            'bahan_bakar' => 'Pertamax',
            'harga_sewa' => '100000',
            'kapasitas' => '4',
            'gambar_mobil' => 'mobil1.jpg',
            'status' => 'Tersedia',
            'tipe_mobil_id' => '1',
        ]);
    }
}
