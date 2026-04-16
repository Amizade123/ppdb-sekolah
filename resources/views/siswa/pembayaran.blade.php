@extends('layouts.siswa')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-2">Pembayaran PPDB</h1>
    <p class="text-slate-500">
        Upload bukti pembayaran administrasi pendaftaran siswa baru.
    </p>
</div>

@if(session('success'))
<div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
    <p class="font-semibold mb-2">Terdapat kesalahan:</p>
    <ul class="list-disc pl-5 space-y-1 text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(!$ppdb)
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
    <p class="text-slate-600">Data PPDB belum ditemukan. Silakan isi formulir terlebih dahulu.</p>
</div>
@else
<div class="grid lg:grid-cols-3 gap-6">
    {{-- Info Tagihan --}}
    <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-xl font-bold text-slate-800 mb-4">Informasi Tagihan</h2>

        <div class="space-y-4">
            <div>
                <p class="text-sm text-slate-500">Nominal Tagihan</p>
                <p class="text-3xl font-bold text-blue-700">
                    Rp {{ number_format($ppdb->nominal_tagihan ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Status PPDB</p>
                <p class="font-semibold text-slate-800">{{ $ppdb->status_ppdb_label }}</p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Status Pembayaran</p>
                <p class="font-semibold text-slate-800">{{ $ppdb->status_pembayaran_label }}</p>
            </div>

            <div class="pt-4 border-t border-slate-200">
                <p class="text-sm text-slate-500 mb-1">Transfer ke rekening:</p>
                <p class="font-semibold text-slate-800">Bank BRI - 1234567890</p>
                <p class="text-sm text-slate-600">a.n. SMA Negeri Contoh</p>
            </div>
        </div>
    </div>

    {{-- Upload Bukti --}}
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-xl font-bold text-slate-800 mb-4">Upload Bukti Pembayaran</h2>

        @if(!in_array($ppdb->status_ppdb, ['diterima', 'aktif']))
        <div class="rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-yellow-700">
            Pembayaran belum bisa dilakukan. Tunggu sampai status PPDB kamu <b>Diterima</b>.
        </div>
        @else
        <form action="{{ route('siswa.pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Pilih File Bukti Transfer</label>
                <input type="file" name="bukti_pembayaran" class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">
                <p class="text-xs text-slate-500 mt-2">Format: JPG, JPEG, PNG, PDF (maks. 2MB)</p>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                Upload Bukti Pembayaran
            </button>
        </form>
        @endif

        @if($ppdb->bukti_pembayaran)
        <div class="mt-8 pt-6 border-t border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800 mb-3">Bukti yang Sudah Diupload</h3>

            <a href="{{ asset($ppdb->bukti_pembayaran) }}" target="_blank"
                class="inline-block px-4 py-2 rounded-xl bg-green-600 text-white hover:bg-green-700 transition">
                Lihat Bukti Pembayaran
            </a>

            @if($ppdb->tanggal_upload_pembayaran)
            <p class="text-sm text-slate-500 mt-3">
                Diupload pada: {{ $ppdb->tanggal_upload_pembayaran->format('d M Y H:i') }}
            </p>
            @endif
        </div>
        @endif
    </div>
</div>
@endif

@endsection