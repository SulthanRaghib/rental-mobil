<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_role',
    ];

    // Relasi One to Many ke tabel Mitra
    public function mitra()
    {
        return $this->hasMany(Mitra::class);
    }
}
