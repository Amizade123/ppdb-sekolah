@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Admin</h1>
    <p class="text-slate-500 mt-2">Ringkasan data PPDB dan akademik sekolah.</p>
</div>

<!-- Statistik Utama -->
<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Pendaftar</p>
        <h2 class="text-4xl font-bold text-blue-600 mt-2">{{ $totalPendaftar }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Diterima</p>
        <h2 class="text-4xl font-bold text-green-600 mt-2">{{ $totalDiterima }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Siswa Aktif</p>
        <h2 class="text-4xl font-bold text-purple-600 mt-2">{{ $totalAktif }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Pembayaran Lunas</p>
        <h2 class="text-4xl font-bold text-orange-500 mt-2">{{ $totalLunas }}</h2>
    </div>

</div>

<!-- Statistik Akademik -->
<div class="grid md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Kelas</p>
        <h2 class="text-3xl font-bold text-blue-700 mt-2">{{ $totalKelas }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Guru</p>
        <h2 class="text-3xl font-bold text-green-700 mt-2">{{ $totalGuru }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Jadwal</p>
        <h2 class="text-3xl font-bold text-indigo-700 mt-2">{{ $totalJadwal }}</h2>
    </div>

</div>

<!-- Info Cepat -->
<div class="grid lg:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-3">Menu Cepat</h3>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('admin.ppdb.index') }}" class="p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
                <p class="font-semibold text-blue-700">Verifikasi PPDB</p>
                <p class="text-sm text-slate-500 mt-1">Cek berkas pendaftar</p>
            </a>

            <a href="{{ route('admin.pembayaran.index') }}" class="p-4 rounded-xl bg-green-50 hover:bg-green-100 transition">
                <p class="font-semibold text-green-700">Pembayaran</p>
                <p class="text-sm text-slate-500 mt-1">Validasi bukti transfer</p>
            </a>

            <a href="{{ route('admin.kelas.plotting') }}" class="p-4 rounded-xl bg-purple-50 hover:bg-purple-100 transition">
                <p class="font-semibold text-purple-700">Plotting Kelas</p>
                <p class="text-sm text-slate-500 mt-1">Masukkan siswa ke kelas</p>
            </a>

            <a href="{{ route('admin.jadwal.index') }}" class="p-4 rounded-xl bg-orange-50 hover:bg-orange-100 transition">
                <p class="font-semibold text-orange-700">Jadwal</p>
                <p class="text-sm text-slate-500 mt-1">Kelola jadwal pelajaran</p>
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-3">Status Sistem</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">PPDB</span>
                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">Aktif</span>
            </div>
            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">Pembayaran</span>
                <span class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-full">Online</span>
            </div>
            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">Plotting Kelas</span>
                <span class="px-3 py-1 text-sm bg-purple-100 text-purple-700 rounded-full">Siap</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Jadwal Akademik</span>
                <span class="px-3 py-1 text-sm bg-orange-100 text-orange-700 rounded-full">Aktif</span>
            </div>
        </div>
    </div>

</div>

@endsection