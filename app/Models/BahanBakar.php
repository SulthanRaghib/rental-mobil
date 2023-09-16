<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakar extends Model
{
    use HasFactory;

    protected $table = 'bahan_bakars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_bahan_bakar',
    ];

    // Relasi One to Many ke tabel Mobil
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
