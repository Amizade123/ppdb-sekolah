<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\PpdbSiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('admin.kelas.index', [
            'title' => 'Kelola Kelas',
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:100',
            'kapasitas' => 'required|integer|min:1',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function plotting()
    {
        $siswa = PpdbSiswa::with('user', 'kelas')
            ->where('status_ppdb', 'aktif')
            ->latest()
            ->get();

        $kelas = Kelas::all();

        return view('admin.kelas.plotting', [
            'title' => 'Plotting Kelas Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function assign(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = PpdbSiswa::findOrFail($id);

        $siswa->update([
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('admin.kelas.plotting')->with('success', 'Siswa berhasil ditempatkan ke kelas.');
    }
}
