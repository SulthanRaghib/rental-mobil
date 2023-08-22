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
        'no_polisi',
        'harga_sewa',
        'kapasitas',
        'gambar_mobil',
        'status',
        'merek_id',
        'bahan_bakar_id',
        'tipe_mobil_id',
    ];
}
