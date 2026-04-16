@extends('layouts.guru')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Guru</h1>
    <p class="text-slate-500 mt-2">Ringkasan jadwal dan kelas yang Anda ajar.</p>
</div>

@if(!$guru)
<div class="mb-6 p-4 rounded-2xl bg-yellow-50 border border-yellow-200 text-yellow-800">
    Profil guru belum tersedia. Silakan hubungi admin.
</div>
@endif

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Nama Guru</p>
        <h2 class="text-2xl font-bold text-blue-700 mt-2">
            {{ $guru->nama_guru ?? 'Belum tersedia' }}
        </h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Jumlah Kelas</p>
        <h2 class="text-4xl font-bold text-green-600 mt-2">
            {{ $jumlahKelas ?? 0 }}
        </h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Total Jadwal Mengajar</p>
        <h2 class="text-4xl font-bold text-purple-600 mt-2">
            {{ $jumlahJadwal ?? 0 }}
        </h2>
    </div>

</div>

<div class="grid lg:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Informasi Guru</h3>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between border-b pb-2">
                <span class="text-slate-500">Nama</span>
                <span class="font-medium text-slate-800">{{ $guru->nama_guru ?? '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">NIP</span>
                <span class="font-medium text-slate-800">{{ $guru->nip ?? '-' }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Menu Cepat</h3>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('guru.jadwal.index') }}" class="p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
                <p class="font-semibold text-blue-700">📚 Jadwal Mengajar</p>
                <p class="text-sm text-slate-500 mt-1">Lihat jadwal kelas yang Anda ajar</p>
            </a>
        </div>
    </div>

</div>

@endsection