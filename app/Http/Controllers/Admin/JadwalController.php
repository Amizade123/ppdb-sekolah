<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruProfile;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPelajaran::with(['kelas', 'guru.user', 'mapel'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        $kelas = Kelas::all();
        $guru = GuruProfile::with('user')->get();
        $mapel = MataPelajaran::all();

        return view('admin.jadwal.index', [
            'title' => 'Jadwal Pelajaran',
            'jadwal' => $jadwal,
            'kelas' => $kelas,
            'guru' => $guru,
            'mapel' => $mapel,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'guru_profile_id' => 'required|exists:guru_profiles,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        // 🔥 CEK BENTROK KELAS
        $bentrokKelas = JadwalPelajaran::where('kelas_id', $request->kelas_id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })
            ->exists();

        if ($bentrokKelas) {
            return back()->withErrors([
                'kelas_id' => 'Jadwal bentrok: kelas sudah memiliki jadwal di waktu tersebut.'
            ])->withInput();
        }

        // 🔥 CEK BENTROK GURU
        $bentrokGuru = JadwalPelajaran::where('guru_profile_id', $request->guru_profile_id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })
            ->exists();

        if ($bentrokGuru) {
            return back()->withErrors([
                'guru_profile_id' => 'Jadwal bentrok: guru sudah mengajar di waktu tersebut.'
            ])->withInput();
        }

        // ✅ SIMPAN
        JadwalPelajaran::create([
            'kelas_id' => $request->kelas_id,
            'guru_profile_id' => $request->guru_profile_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }
}
