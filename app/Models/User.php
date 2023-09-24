<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'email_verified_at',
        'password',
        'kode_user',
        'nama_perusahaan',
        'no_telp',
        'alamat',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi Many to One ke tabel Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi One to Many ke tabel Mobil
    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }

    // Relasi One to Many ke tabel Sewa
    public function sewa()
    {
        return $this->hasMany(Sewa::class);
    }
}
