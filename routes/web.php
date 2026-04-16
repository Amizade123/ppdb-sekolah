<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\PpdbController;
use App\Http\Controllers\Siswa\PembayaranController;
use App\Http\Controllers\Siswa\JadwalController as SiswaJadwalController;

use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;

use App\Http\Controllers\Guru\JadwalController as GuruJadwalController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;
use App\Http\Controllers\KepalaSekolah\SiswaController as KepalaSiswaController;
use App\Http\Controllers\Admin\MataPelajaranController;
// Models
use App\Models\PpdbSiswa;
use App\Models\Kelas;
use App\Models\JadwalPelajaran;
use App\Models\GuruProfile;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('public.home', [
        'title' => 'Beranda Sekolah',
    ]);
})->name('home');


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:siswa'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Siswa
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        $ppdb = PpdbSiswa::with('kelas')
            ->where('user_id', Auth::id())
            ->first();

        return view('siswa.dashboard', [
            'title' => 'Dashboard Siswa',
            'ppdb' => $ppdb,
        ]);
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Formulir PPDB
    |--------------------------------------------------------------------------
    */
    Route::get('/ppdb/formulir', [PpdbController::class, 'form'])->name('siswa.formulir');
    Route::post('/ppdb/formulir', [PpdbController::class, 'store'])->name('siswa.formulir.store');


    /*
    |--------------------------------------------------------------------------
    | Pembayaran
    |--------------------------------------------------------------------------
    */
    Route::get('/ppdb/pembayaran', [PembayaranController::class, 'index'])->name('siswa.pembayaran');
    Route::post('/ppdb/pembayaran', [PembayaranController::class, 'store'])->name('siswa.pembayaran.store');


    /*
    |--------------------------------------------------------------------------
    | Jadwal Pelajaran Siswa
    |--------------------------------------------------------------------------
    */
    Route::get('/jadwal', [SiswaJadwalController::class, 'index'])->name('siswa.jadwal.index');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',

            'totalPendaftar' => PpdbSiswa::count(),
            'totalDiterima' => PpdbSiswa::where('status_ppdb', 'diterima')->count(),
            'totalAktif' => PpdbSiswa::where('status_ppdb', 'aktif')->count(),
            'totalLunas' => PpdbSiswa::where('status_pembayaran', 'lunas')->count(),

            'totalKelas' => Kelas::count(),
            'totalGuru' => GuruProfile::count(),
            'totalJadwal' => JadwalPelajaran::count(),
        ]);
    })->name('admin.dashboard');

    Route::get('/export/siswa', [AdminPpdbController::class, 'export'])
        ->name('admin.export.siswa');
    Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index'])->name('admin.mapel.index');
    Route::post('/mata-pelajaran', [MataPelajaranController::class, 'store'])->name('admin.mapel.store');
    Route::put('/mata-pelajaran/{id}', [MataPelajaranController::class, 'update'])->name('admin.mapel.update');
    Route::delete('/mata-pelajaran/{id}', [MataPelajaranController::class, 'destroy'])->name('admin.mapel.destroy');


    /*
    |--------------------------------------------------------------------------
    | Verifikasi PPDB
    |--------------------------------------------------------------------------
    */
    Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('admin.ppdb.index');
    Route::get('/ppdb/{id}', [AdminPpdbController::class, 'show'])->name('admin.ppdb.show');
    Route::put('/ppdb/{id}', [AdminPpdbController::class, 'update'])->name('admin.ppdb.update');


    /*
    |--------------------------------------------------------------------------
    | Verifikasi Pembayaran
    |--------------------------------------------------------------------------
    */
    Route::get('/pembayaran', [AdminPpdbController::class, 'pembayaran'])->name('admin.pembayaran.index');


    /*
    |--------------------------------------------------------------------------
    | Kelola Kelas
    |--------------------------------------------------------------------------
    */
    Route::get('/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');


    /*
    |--------------------------------------------------------------------------
    | Plotting Kelas
    |--------------------------------------------------------------------------
    */
    Route::get('/kelas/plotting', [KelasController::class, 'plotting'])->name('admin.kelas.plotting');
    Route::put('/kelas/plotting/{id}', [KelasController::class, 'assign'])->name('admin.kelas.assign');


    /*
    |--------------------------------------------------------------------------
    | Jadwal Pelajaran
    |--------------------------------------------------------------------------
    */
    Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('admin.jadwal.index');
    Route::post('/jadwal', [AdminJadwalController::class, 'store'])->name('admin.jadwal.store');
});


/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/

Route::prefix('guru')->middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/dashboard', function () {
        $guru = \App\Models\GuruProfile::where('user_id', Auth::id())->first();

        $jadwal = collect();

        if ($guru) {
            $jadwal = \App\Models\JadwalPelajaran::with(['kelas', 'mapel'])
                ->where('guru_profile_id', $guru->id)
                ->get();
        }

        $jumlahKelas = $jadwal->pluck('kelas_id')->unique()->count();
        $jumlahJadwal = $jadwal->count();

        return view('guru.dashboard', [
            'title' => 'Dashboard Guru',
            'guru' => $guru,
            'jumlahKelas' => $jumlahKelas,
            'jumlahJadwal' => $jumlahJadwal,
            'jadwal' => $jadwal,
        ]);
    })->name('guru.dashboard');

    Route::get('/jadwal', [GuruJadwalController::class, 'index'])->name('guru.jadwal.index');
    Route::get('/kelas', [GuruSiswaController::class, 'index'])->name('guru.kelas.index');
    Route::get('/kelas/{id}', [GuruSiswaController::class, 'show'])->name('guru.kelas.show');
});


/*
|--------------------------------------------------------------------------
| KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

Route::prefix('kepala')->middleware(['auth', 'role:kepala_sekolah'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Kepala Sekolah
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return view('kepala.dashboard', [
            'title' => 'Dashboard Kepala Sekolah',

            'totalSiswa' => \App\Models\PpdbSiswa::where('status_ppdb', 'aktif')->count(),
            'totalPendaftar' => \App\Models\PpdbSiswa::count(),
            'totalLunas' => \App\Models\PpdbSiswa::where('status_pembayaran', 'lunas')->count(),
            'totalKelas' => \App\Models\Kelas::count(),
        ]);
    })->name('kepala.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Data Siswa
    |--------------------------------------------------------------------------
    */
    Route::get('/siswa', [KepalaSiswaController::class, 'index'])->name('kepala.siswa.index');

    /*
    |--------------------------------------------------------------------------
    | Export Excel
    |--------------------------------------------------------------------------
    */
    Route::get('/siswa/export', [KepalaSiswaController::class, 'export'])->name('kepala.siswa.export');
});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
