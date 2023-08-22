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
            'nama' => 'Toyota',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Honda',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Suzuki',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Daihatsu',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Mitsubishi',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Nissan',
        ]);
        \App\Models\Merek::factory()->create([
            'nama' => 'Hyundai',
        ]);
    }
}
