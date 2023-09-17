<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Mitra::factory()->create([
            'nama_pemilik' => 'Johsena',
            'email_mitra' => 'mitra1@gmail.com',
            'password' => Hash::make('mitra123'),
            'nama_perusahaan' => 'Rental John',
            'alamat_rental' => 'Jl. Pahlawan',
            'no_hp' => '081234567890',
            'role_id' => '3',
        ]);

        \App\Models\Mitra::factory()->create([
            'nama_pemilik' => 'Biksau',
            'email_mitra' => 'mitra2@gmail.com',
            'password' => Hash::make('mitra123'),
            'nama_perusahaan' => 'Rental Biksau',
            'alamat_rental' => 'Jl. Bangau',
            'no_hp' => '081234567890',
            'role_id' => '3',
        ]);
    }
}
