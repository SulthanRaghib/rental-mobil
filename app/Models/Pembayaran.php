<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'total',
        'nama_pembayar',
        'status',
        'link_pembayaran',
        'sewa_id'
    ];
}
