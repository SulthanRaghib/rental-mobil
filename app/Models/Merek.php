<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $table = 'mereks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_merek',
    ];
}
