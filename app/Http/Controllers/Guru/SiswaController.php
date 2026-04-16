<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\GuruProfile;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\PpdbSiswa;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $guru = GuruProfile::where('user_id', Auth::id())->first();

        $kelasIds = [];

        if ($guru) {
            $kelasIds = JadwalPelajaran::where('guru_profile_id', $guru->id)
                ->pluck('kelas_id')
                ->unique()
                ->toArray();
        }

        $kelas = Kelas::whereIn('id', $kelasIds)->get();

        return view('guru.siswa.index', [
            'title' => 'Daftar Kelas',
            'guru' => $guru,
            'kelas' => $kelas,
        ]);
    }

    public function show($id)
    {
        $guru = GuruProfile::where('user_id', Auth::id())->first();

        if (!$guru) {
            abort(403, 'Profil guru tidak ditemukan.');
        }

        // Cek apakah guru benar-benar mengajar di kelas ini
        $bolehAkses = JadwalPelajaran::where('guru_profile_id', $guru->id)
            ->where('kelas_id', $id)
            ->exists();

        if (!$bolehAkses) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }

        $kelas = Kelas::findOrFail($id);

        $siswa = PpdbSiswa::where('kelas_id', $id)
            ->where('status_ppdb', 'aktif')
            ->orderBy('nama_lengkap')
            ->get();

        return view('guru.siswa.show', [
            'title' => 'Daftar Siswa Kelas',
            'guru' => $guru,
            'kelas' => $kelas,
            'siswa' => $siswa,
        ]);
    }
}
