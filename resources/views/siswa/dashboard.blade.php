@extends('layouts.siswa')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Siswa</h1>
    <p class="text-slate-500 mt-2">Pantau status pendaftaran, pembayaran, dan informasi akademik Anda.</p>
</div>

{{-- Alert jika belum isi formulir --}}
@if(!$ppdb)
<div class="mb-6 p-4 rounded-2xl bg-yellow-50 border border-yellow-200 text-yellow-800">
    Anda belum mengisi formulir PPDB. Silakan lengkapi data terlebih dahulu.
</div>
@endif

{{-- Statistik Utama --}}
<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Status PPDB</p>
        <h2 class="text-2xl font-bold mt-2">
            @if($ppdb)
            @if($ppdb->status_ppdb == 'pending')
            <span class="text-yellow-600">⏳ Pending</span>
            @elseif($ppdb->status_ppdb == 'diterima')
            <span class="text-green-600">✅ Diterima</span>
            @elseif($ppdb->status_ppdb == 'ditolak')
            <span class="text-red-600">❌ Ditolak</span>
            @elseif($ppdb->status_ppdb == 'aktif')
            <span class="text-blue-600">🎓 Siswa Aktif</span>
            @else
            <span class="text-slate-500">-</span>
            @endif
            @else
            <span class="text-slate-500">Belum Isi</span>
            @endif
        </h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Status Pembayaran</p>
        <h2 class="text-2xl font-bold mt-2">
            @if($ppdb)
            @if($ppdb->status_pembayaran == 'belum_bayar')
            <span class="text-red-500">💸 Belum Bayar</span>
            @elseif($ppdb->status_pembayaran == 'menunggu_verifikasi')
            <span class="text-yellow-600">🕒 Menunggu Verifikasi</span>
            @elseif($ppdb->status_pembayaran == 'lunas')
            <span class="text-green-600">💰 Lunas</span>
            @elseif($ppdb->status_pembayaran == 'ditolak')
            <span class="text-red-600">❌ Ditolak</span>
            @else
            <span class="text-slate-500">-</span>
            @endif
            @else
            <span class="text-slate-500">-</span>
            @endif
        </h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Nominal Tagihan</p>
        <h2 class="text-2xl font-bold text-orange-500 mt-2">
            Rp {{ number_format($ppdb->nominal_tagihan ?? 0, 0, ',', '.') }}
        </h2>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <p class="text-sm text-slate-500">Kelas</p>
        <h2 class="text-2xl font-bold text-blue-700 mt-2">
            {{ $ppdb?->kelas?->nama_kelas ?? 'Belum Dipetakan' }}
        </h2>
    </div>

</div>

{{-- Info Ringkas --}}
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Informasi Siswa</h3>

        @if($ppdb)
        <div class="space-y-3 text-sm">
            <div class="flex justify-between border-b pb-2">
                <span class="text-slate-500">Nama Lengkap</span>
                <span class="font-medium text-slate-800">{{ $ppdb->nama_lengkap }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-slate-500">NISN</span>
                <span class="font-medium text-slate-800">{{ $ppdb->nisn ?? '-' }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-slate-500">Asal Sekolah</span>
                <span class="font-medium text-slate-800">{{ $ppdb->asal_sekolah ?? '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">No HP</span>
                <span class="font-medium text-slate-800">{{ $ppdb->no_hp ?? '-' }}</span>
            </div>
        </div>
        @else
        <p class="text-slate-500">Data siswa belum tersedia.</p>
        @endif
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Status Proses</h3>

        <div class="space-y-4">
            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">Formulir PPDB</span>
                <span class="px-3 py-1 text-sm rounded-full {{ $ppdb ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $ppdb ? 'Sudah Diisi' : 'Belum' }}
                </span>
            </div>

            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">Verifikasi Admin</span>
                <span class="px-3 py-1 text-sm rounded-full
                    @if(($ppdb->status_ppdb ?? '') == 'diterima' || ($ppdb->status_ppdb ?? '') == 'aktif') bg-green-100 text-green-700
                    @elseif(($ppdb->status_ppdb ?? '') == 'ditolak') bg-red-100 text-red-700
                    @else bg-yellow-100 text-yellow-700
                    @endif">
                    {{ $ppdb?->status_ppdb ?? 'Pending' }}
                </span>
            </div>

            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-600">Pembayaran</span>
                <span class="px-3 py-1 text-sm rounded-full
                    @if(($ppdb->status_pembayaran ?? '') == 'lunas') bg-green-100 text-green-700
                    @elseif(($ppdb->status_pembayaran ?? '') == 'ditolak') bg-red-100 text-red-700
                    @else bg-yellow-100 text-yellow-700
                    @endif">
                    {{ $ppdb?->status_pembayaran ?? 'Belum Bayar' }}
                </span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-slate-600">Status Siswa</span>
                <span class="px-3 py-1 text-sm rounded-full {{ ($ppdb?->status_ppdb == 'aktif') ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600' }}">
                    {{ ($ppdb?->status_ppdb == 'aktif') ? 'Aktif' : 'Belum Aktif' }}
                </span>
            </div>
        </div>
    </div>

</div>

{{-- Menu Cepat --}}
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
    <h3 class="text-lg font-semibold text-slate-800 mb-4">Menu Cepat</h3>

    <div class="grid md:grid-cols-3 gap-4">
        <a href="{{ route('siswa.formulir') }}" class="p-5 rounded-xl bg-blue-50 hover:bg-blue-100 transition">
            <p class="font-semibold text-blue-700">📝 Formulir PPDB</p>
            <p class="text-sm text-slate-500 mt-1">Lengkapi biodata dan data pendaftaran</p>
        </a>

        <a href="{{ route('siswa.pembayaran') }}" class="p-5 rounded-xl bg-green-50 hover:bg-green-100 transition">
            <p class="font-semibold text-green-700">💳 Pembayaran</p>
            <p class="text-sm text-slate-500 mt-1">Upload bukti pembayaran pendaftaran</p>
        </a>

        <a href="{{ route('siswa.jadwal.index') }}" class="p-5 rounded-xl bg-purple-50 hover:bg-purple-100 transition">
            <p class="font-semibold text-purple-700">📚 Jadwal Pelajaran</p>
            <p class="text-sm text-slate-500 mt-1">Lihat jadwal pelajaran sesuai kelas</p>
        </a>
    </div>
</div>

@endsection