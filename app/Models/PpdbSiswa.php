<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PpdbSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas_id',

        // Data Diri
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp_siswa',

        // Orang Tua / Wali
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_hp_wali',

        // Data Sekolah Asal
        'asal_sekolah',
        'tahun_lulus',
        'alamat_sekolah',

        // Berkas
        'file_kk',
        'file_akta',
        'file_ijazah',
        'file_foto',

        // Status
        'status_ppdb',
        'status_pembayaran',
        'catatan_admin',
        'nominal_tagihan',
        'bukti_pembayaran',
        'tanggal_upload_pembayaran',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_upload_pembayaran' => 'datetime',
        'nominal_tagihan' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor Label
    |--------------------------------------------------------------------------
    */

    public function getJenisKelaminLabelAttribute()
    {
        return match ($this->jenis_kelamin) {
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
            default => '-',
        };
    }

    public function getStatusPpdbLabelAttribute()
    {
        return match ($this->status_ppdb) {
            'belum_lengkap' => 'Belum Lengkap',
            'menunggu_verifikasi' => 'Menunggu Verifikasi',
            'revisi' => 'Perlu Revisi',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak',
            'aktif' => 'Siswa Aktif',
            default => 'Belum Lengkap',
        };
    }

    public function getStatusPembayaranLabelAttribute()
    {
        return match ($this->status_pembayaran) {
            'belum_bayar' => 'Belum Bayar',
            'menunggu_verifikasi' => 'Menunggu Verifikasi',
            'ditolak' => 'Ditolak',
            'lunas' => 'Lunas',
            default => 'Belum Bayar',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor Badge Color
    |--------------------------------------------------------------------------
    */

    public function getStatusPpdbColorAttribute()
    {
        return match ($this->status_ppdb) {
            'belum_lengkap' => 'bg-slate-100 text-slate-700 border-slate-200',
            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'revisi' => 'bg-orange-100 text-orange-700 border-orange-200',
            'diterima' => 'bg-blue-100 text-blue-700 border-blue-200',
            'ditolak' => 'bg-red-100 text-red-700 border-red-200',
            'aktif' => 'bg-green-100 text-green-700 border-green-200',
            default => 'bg-slate-100 text-slate-700 border-slate-200',
        };
    }

    public function getStatusPembayaranColorAttribute()
    {
        return match ($this->status_pembayaran) {
            'belum_bayar' => 'bg-red-100 text-red-700 border-red-200',
            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'ditolak' => 'bg-orange-100 text-orange-700 border-orange-200',
            'lunas' => 'bg-green-100 text-green-700 border-green-200',
            default => 'bg-red-100 text-red-700 border-red-200',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor Progress Step
    |--------------------------------------------------------------------------
    */

    public function getProgressStepAttribute()
    {
        return match ($this->status_ppdb) {
            'belum_lengkap' => 2,
            'menunggu_verifikasi' => 4,
            'revisi' => 3,
            'diterima' => 5,
            'ditolak' => 4,
            'aktif' => 6,
            default => 1,
        };
    }
}