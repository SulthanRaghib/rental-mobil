<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Mitra extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'mitras';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pemilik',
        'email_mitra',
        'password',
        'nama_perusahaan',
        'alamat_rental',
        'no_hp',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi One to Many ke tabel Mobil
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

    // Relasi Many to One ke tabel Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
