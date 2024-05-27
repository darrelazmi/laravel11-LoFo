<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_temuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'foto_barang',
        'deskripsi',
        'lokasi',
        'phone',
        'user_id'
    ];
}
