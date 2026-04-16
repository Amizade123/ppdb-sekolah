<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\GuruProfile;
use App\Models\JadwalPelajaran;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $guru = GuruProfile::where('user_id', Auth::id())->first();

        $jadwal = collect();

        if ($guru) {
            $jadwal = JadwalPelajaran::with(['kelas', 'mapel'])
                ->where('guru_profile_id', $guru->id)
                ->orderBy('hari')
                ->orderBy('jam_mulai')
                ->get();
        }

        return view('guru.jadwal.index', [
            'title' => 'Jadwal Mengajar',
            'guru' => $guru,
            'jadwal' => $jadwal,
        ]);
    }
}
