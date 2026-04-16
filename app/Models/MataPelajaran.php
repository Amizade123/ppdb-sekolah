<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'kelompok',
    ];
}
