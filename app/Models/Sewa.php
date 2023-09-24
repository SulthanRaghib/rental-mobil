<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_sewa',
        'waktu_sewa',
        'tanggal_kembali',
        'waktu_kembali',
        'total_bayar',
        'no_ktp',
        'status',
        'user_id',
        'mobil_id',
    ];

    // Relasi Many to One ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many to One ke tabel Mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public static function selectSewaAll()
    {
        return Sewa::join('users', 'sewas.user_id', '=', 'users.id')
            ->join('mobils', 'sewas.mobil_id', '=', 'mobils.id')
            ->join('type_mobils', 'mobils.type_mobil_id', '=', 'type_mobils.id')
            ->join('mereks', 'mobils.merek_id', '=', 'mereks.id')
            ->select(
                'sewas.*',
                'users.nama',
                'mereks.nama_merek',
                'mobils.gambar_mobil',
                'mobils.plat_nomor',
                'mobils.harga_sewa',
                'mobils.kapasitas',
                'mobils.kode_mobil',
                'mobils.id as mobil_id',
                'type_mobils.nama_type_mobil',
            )
            ->get();
    }
}
