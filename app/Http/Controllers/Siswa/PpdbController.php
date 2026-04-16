<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\PpdbSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function form()
    {
        $data = PpdbSiswa::where('user_id', Auth::id())->first();

        return view('siswa.formulir', [
            'title' => 'Formulir PPDB',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'nullable|string|max:255',
            'nisn'           => 'nullable|string|max:50',
            'tempat_lahir'   => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date',
            'jenis_kelamin'  => 'nullable|in:L,P',
            'agama'          => 'nullable|string|max:100',
            'alamat'         => 'nullable|string',
            'no_hp_siswa'    => 'nullable|string|max:20',

            'nama_ayah'      => 'nullable|string|max:255',
            'nama_ibu'       => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu'  => 'nullable|string|max:255',
            'no_hp_wali'     => 'nullable|string|max:20',

            'asal_sekolah'   => 'nullable|string|max:255',
            'tahun_lulus'    => 'nullable|string|max:10',
            'alamat_sekolah' => 'nullable|string',

            'file_kk'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_akta'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_ijazah'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_foto'      => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ppdb = PpdbSiswa::firstOrNew([
            'user_id' => Auth::id(),
        ]);

        // =========================
        // UPLOAD FILE (FIX UTAMA)
        // =========================

        if ($request->hasFile('file_kk')) {
            $validated['file_kk'] = $request->file('file_kk')->store('ppdb/kk', 'public');
        }

        if ($request->hasFile('file_akta')) {
            $validated['file_akta'] = $request->file('file_akta')->store('ppdb/akta', 'public');
        }

        if ($request->hasFile('file_ijazah')) {
            $validated['file_ijazah'] = $request->file('file_ijazah')->store('ppdb/ijazah', 'public');
        }

        if ($request->hasFile('file_foto')) {
            $validated['file_foto'] = $request->file('file_foto')->store('ppdb/foto', 'public');
        }

        $ppdb->fill($validated);
        $ppdb->user_id = Auth::id();

        // STATUS LOGIC
        if (!empty($validated['nama_lengkap']) && !empty($validated['nisn'])) {
            if (in_array($ppdb->status_ppdb, [null, 'belum_lengkap', 'revisi'])) {
                $ppdb->status_ppdb = 'menunggu_verifikasi';
            }
        }

        if (empty($ppdb->status_pembayaran)) {
            $ppdb->status_pembayaran = 'belum_bayar';
        }

        $ppdb->save();

        return redirect()
            ->route('siswa.formulir')
            ->with('success', 'Formulir berhasil disimpan');
    }
}
