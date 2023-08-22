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
            'nama' => 'Pertalite',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Pertamax',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Pertamax Turbo',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Pertamax Racing',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Pertamina Dex',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Dexlite',
        ]);
        \App\Models\BahanBakar::factory()->create([
            'nama' => 'Solar',
        ]);
    }
}
