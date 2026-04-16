<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbSiswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $kelas = \App\Models\Kelas::all();

        $data = \App\Models\PpdbSiswa::with('kelas')
            ->when($request->kelas_id, function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            })
            ->latest()
            ->get();

        return view('admin.ppdb.index', [
            'data' => $data,
            'kelas' => $kelas,
        ]);
    }

    public function show($id)
    {
        $ppdb = PpdbSiswa::with('user')->findOrFail($id);

        return view('admin.ppdb.show', [
            'title' => 'Detail PPDB',
            'ppdb' => $ppdb
        ]);
    }
    public function export(Request $request)
    {
        return Excel::download(
            new SiswaExport($request->kelas_id),
            'data_siswa.xlsx'
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_ppdb' => 'required',
            'status_pembayaran' => 'required',
            'nominal_tagihan' => 'required|numeric|min:0',
            'catatan_admin' => 'nullable|string'
        ]);

        $ppdb = PpdbSiswa::findOrFail($id);

        $ppdb->update([
            'status_ppdb' => $request->status_ppdb,
            'status_pembayaran' => $request->status_pembayaran,
            'nominal_tagihan' => $request->nominal_tagihan,
            'catatan_admin' => $request->catatan_admin,
        ]);

        // Otomatis aktif kalau diterima + lunas
        if ($ppdb->status_ppdb === 'diterima' && $ppdb->status_pembayaran === 'lunas') {
            $ppdb->status_ppdb = 'aktif';
            $ppdb->save();
        }

        return redirect()->route('admin.ppdb.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function pembayaran()
    {
        $data = PpdbSiswa::with('user')
            ->whereNotNull('bukti_pembayaran')
            ->latest()
            ->get();

        return view('admin.pembayaran.index', [
            'title' => 'Verifikasi Pembayaran',
            'data' => $data
        ]);
    }
}
