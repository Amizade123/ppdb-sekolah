<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\PpdbSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $ppdb = PpdbSiswa::where('user_id', Auth::id())->first();

        return view('siswa.pembayaran', [
            'title' => 'Pembayaran PPDB',
            'ppdb' => $ppdb
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $ppdb = PpdbSiswa::where('user_id', Auth::id())->firstOrFail();

        // hanya boleh upload jika status sudah diterima / aktif
        if (!in_array($ppdb->status_ppdb, ['diterima', 'aktif'])) {
            return redirect()->back()->with('error', 'Pembayaran belum tersedia. Tunggu verifikasi admin terlebih dahulu.');
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pembayaran'), $filename);

            $ppdb->bukti_pembayaran = 'uploads/pembayaran/' . $filename;
            $ppdb->tanggal_upload_pembayaran = now();
            $ppdb->status_pembayaran = 'menunggu_verifikasi';
            $ppdb->save();
        }

        return redirect()->route('siswa.pembayaran')->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}
