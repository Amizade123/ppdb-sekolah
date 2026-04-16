@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Detail PPDB</h1>

<div class="bg-white p-6 rounded-xl shadow space-y-4">
    <p><b>Nama:</b> {{ $ppdb->nama_lengkap }}</p>
    <p><b>NISN:</b> {{ $ppdb->nisn }}</p>
    <p><b>Asal Sekolah:</b> {{ $ppdb->asal_sekolah }}</p>
    <p><b>Status PPDB:</b> {{ $ppdb->status_ppdb_label }}</p>
    <p><b>Status Pembayaran:</b> {{ $ppdb->status_pembayaran_label }}</p>
    <p><b>Nominal Tagihan:</b> Rp {{ number_format($ppdb->nominal_tagihan ?? 0, 0, ',', '.') }}</p>

    @if($ppdb->bukti_pembayaran)
    <p>
        <b>Bukti Pembayaran:</b>
        <a href="{{ asset($ppdb->bukti_pembayaran) }}" target="_blank" class="text-green-600 underline">
            Lihat Bukti
        </a>
    </p>
    @endif
</div>

<form method="POST" action="{{ route('admin.ppdb.update', $ppdb->id) }}"
    class="mt-6 bg-white p-6 rounded-xl shadow space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label class="block mb-2 font-medium">Nominal Tagihan</label>
        <input
            type="number"
            name="nominal_tagihan"
            value="{{ old('nominal_tagihan', $ppdb->nominal_tagihan ?? 250000) }}"
            class="w-full border rounded p-2"
            placeholder="Contoh: 250000">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status PPDB</label>
        <select name="status_ppdb" class="w-full border rounded p-2">
            <option value="belum_lengkap" {{ $ppdb->status_ppdb == 'belum_lengkap' ? 'selected' : '' }}>Belum Lengkap</option>
            <option value="menunggu_verifikasi" {{ $ppdb->status_ppdb == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu</option>
            <option value="revisi" {{ $ppdb->status_ppdb == 'revisi' ? 'selected' : '' }}>Revisi</option>
            <option value="diterima" {{ $ppdb->status_ppdb == 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="ditolak" {{ $ppdb->status_ppdb == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="aktif" {{ $ppdb->status_ppdb == 'aktif' ? 'selected' : '' }}>Aktif</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Status Pembayaran</label>
        <select name="status_pembayaran" class="w-full border rounded p-2">
            <option value="belum_bayar" {{ $ppdb->status_pembayaran == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
            <option value="menunggu_verifikasi" {{ $ppdb->status_pembayaran == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="ditolak" {{ $ppdb->status_pembayaran == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="lunas" {{ $ppdb->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Catatan Admin</label>
        <textarea name="catatan_admin" class="w-full border rounded p-2" rows="4">{{ $ppdb->catatan_admin }}</textarea>
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan Perubahan
    </button>
</form>

@endsection