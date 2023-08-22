<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanBakarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Pertalite',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Pertamax',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Pertamax Turbo',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Pertamax Racing',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Pertamina Dex',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Dexlite',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama_bahan_bakar' => 'Solar',
        ]);
    }
}
