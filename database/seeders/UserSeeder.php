<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'nama' => 'Mitra Test 1',
            'email' => 'mitra@gmail.com',
            'password' => Hash::make('mitra123'),
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1',
            'kode_user' => 'MTR-001',
            'nama_perusahaan' => 'Rental John',
            'remember_token' => Str::random(10),
            'role_id' => '3',
        ]);

        \App\Models\User::factory()->create([
            'nama' => 'Mitra Test 2',
            'email' => 'mitra2@gmail.com',
            'password' => Hash::make('mitra123'),
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1',
            'kode_user' => 'MTR-002',
            'nama_perusahaan' => 'Rental Biksau',
            'remember_token' => Str::random(10),
            'role_id' => '3',
        ]);

        \App\Models\User::factory()->create([
            'nama' => 'Admin Test',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1',
            'kode_user' => 'ADM-001',
            'remember_token' => Str::random(10),
            'role_id' => '1',
        ]);

        \App\Models\User::factory()->create([
            'nama' => 'User Test',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'no_telp' => '',
            'alamat' => '',
            'kode_user' => 'USR-001',
            'remember_token' => Str::random(10),
            'role_id' => '2',
        ]);
    }
}
