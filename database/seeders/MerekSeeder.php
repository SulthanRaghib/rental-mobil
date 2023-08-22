<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Toyota',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Honda',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Suzuki',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Daihatsu',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Mitsubishi',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Nissan',
        ]);
        \App\Models\Merek::factory()->create([
            'nama_merek' => 'Hyundai',
        ]);
    }
}
