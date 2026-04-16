<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::latest()->get();

        return view('admin.mata_pelajaran.index', [
            'title' => 'Master Mata Pelajaran',
            'mapels' => $mapels
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'nullable|string|max:50',
            'nama_mapel' => 'required|string|max:255',
            'kelompok'   => 'nullable|string|max:100',
        ]);

        MataPelajaran::create($validated);

        return redirect()
            ->route('admin.mapel.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $validated = $request->validate([
            'kode_mapel' => 'nullable|string|max:50',
            'nama_mapel' => 'required|string|max:255',
            'kelompok'   => 'nullable|string|max:100',
        ]);

        $mapel->update($validated);

        return redirect()
            ->route('admin.mapel.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()
            ->route('admin.mapel.index')
            ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
