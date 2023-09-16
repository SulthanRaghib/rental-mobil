<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMobil extends Model
{
    use HasFactory;

    protected $table = 'type_mobils';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_type_mobil',
    ];

    // Relasi One to Many ke tabel Mobil
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
