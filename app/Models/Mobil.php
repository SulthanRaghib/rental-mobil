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
        'plat_nomor',
        'harga_sewa',
        'kapasitas',
        'gambar_mobil',
        'status',
        'merek_id',
        'bahan_bakar_id',
        'tipe_mobil_id',
    ];

    public static function selectMobilAll()
    {
        return Mobil::join('mereks', 'mobils.merek_id', '=', 'mereks.id')
            ->join('bahan_bakars', 'mobils.bahan_bakar_id', '=', 'bahan_bakars.id')
            ->join('type_mobils', 'mobils.tipe_mobil_id', '=', 'type_mobils.id')
            ->select('*', 'mobils.id as id')
            ->get();
    }

    public static function getDetailMobil($id)
    {
        return Mobil::join('mereks', 'mobils.merek_id', '=', 'mereks.id')
            ->join('bahan_bakars', 'mobils.bahan_bakar_id', '=', 'bahan_bakars.id')
            ->join('type_mobils', 'mobils.tipe_mobil_id', '=', 'type_mobils.id')
            ->select('*', 'mobils.id as id')
            ->where('mobils.id', '=', $id)
            ->first();
    }
}
