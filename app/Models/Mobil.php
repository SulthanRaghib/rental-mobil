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

    // Relasi Many to One ke tabel Merek
    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    // Relasi Many to One ke tabel TypeMobil
    public function type_mobil()
    {
        return $this->belongsTo(TypeMobil::class);
    }

    // Relasi Many to One ke tabel BahanBakar
    public function bahan_bakar()
    {
        return $this->belongsTo(BahanBakar::class);
    }

    public static function selectMobilAll()
    {
        return Mobil::join('mereks', 'mobils.merek_id', '=', 'mereks.id')
            ->join('bahan_bakars', 'mobils.bahan_bakar_id', '=', 'bahan_bakars.id')
            ->join('type_mobils', 'mobils.type_mobil_id', '=', 'type_mobils.id')
            ->select('*', 'mobils.id as id')
            ->get();
    }

    public static function getDetailMobil($id)
    {
        return Mobil::join('mereks', 'mobils.merek_id', '=', 'mereks.id')
            ->join('bahan_bakars', 'mobils.bahan_bakar_id', '=', 'bahan_bakars.id')
            ->join('type_mobils', 'mobils.type_mobil_id', '=', 'type_mobils.id')
            ->select('*', 'mobils.id as id')
            ->where('mobils.id', '=', $id)
            ->first();
    }
}
