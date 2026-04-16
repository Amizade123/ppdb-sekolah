<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'nama_guru',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPelajaran::class, 'guru_profile_id');
    }
}
