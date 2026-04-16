<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\PpdbSiswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();

        $siswa = PpdbSiswa::with('kelas')
            ->when($request->kelas_id, function ($query) use ($request) {
                $query->where('kelas_id', $request->kelas_id);
            })
            ->latest()
            ->get();

        return view('kepala.siswa.index', [
            'title' => 'Data Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
        ]);
    }

    public function export(Request $request)
    {
        return Excel::download(
            new SiswaExport($request->kelas_id),
            'laporan_data_siswa.xlsx'
        );
    }
}
