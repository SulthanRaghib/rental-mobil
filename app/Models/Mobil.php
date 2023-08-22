<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_mobil',
        'merk',
        'no_polisi',
        'bahan_bakar',
        'harga_sewa',
        'kapasitas',
        'gambar_mobil',
        'status',
        'tipe_mobil_id',
    ];
}
