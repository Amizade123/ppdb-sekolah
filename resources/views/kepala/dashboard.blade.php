@extends('layouts.kepala')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Kepala Sekolah</h1>
    <p class="text-slate-500 mt-2">Monitoring data pendaftaran dan siswa aktif sekolah.</p>
</div>

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Siswa Aktif</p>
        <h2 class="text-4xl font-bold text-blue-700 mt-2">{{ $totalSiswa }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Pendaftar</p>
        <h2 class="text-4xl font-bold text-green-600 mt-2">{{ $totalPendaftar }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Pembayaran Lunas</p>
        <h2 class="text-4xl font-bold text-orange-500 mt-2">{{ $totalLunas }}</h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Kelas</p>
        <h2 class="text-4xl font-bold text-purple-600 mt-2">{{ $totalKelas }}</h2>
    </div>

</div>

<div class="grid lg:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Ringkasan Sistem</h3>

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
                <span class="text-slate-600">Akademik</span>
                <span class="px-3 py-1 text-sm bg-purple-100 text-purple-700 rounded-full">Berjalan</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Monitoring</span>
                <span class="px-3 py-1 text-sm bg-orange-100 text-orange-700 rounded-full">Aktif</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Menu Cepat</h3>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('kepala.siswa.index') }}" class="p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
                <p class="font-semibold text-blue-700">👨‍🎓 Data Siswa</p>
                <p class="text-sm text-slate-500 mt-1">Lihat dan filter seluruh data siswa</p>
            </a>
        </div>
    </div>

</div>

@endsection