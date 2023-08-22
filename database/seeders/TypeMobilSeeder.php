<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeMobil::factory()->create([
            'nama' => 'automatic',
        ]);
        \App\Models\TypeMobil::factory()->create([
            'nama' => 'manual',
        ]);
    }
}
