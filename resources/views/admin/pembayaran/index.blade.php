@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Verifikasi Pembayaran</h1>

<div class="bg-white rounded-xl shadow p-4">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Nama</th>
                <th>Status PPDB</th>
                <th>Status Pembayaran</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $item)
            <tr class="border-b">
                <td class="p-2">{{ $item->nama_lengkap }}</td>
                <td>{{ $item->status_ppdb_label }}</td>
                <td>{{ $item->status_pembayaran_label }}</td>
                <td>
                    <a href="{{ asset($item->bukti_pembayaran) }}" target="_blank" class="text-green-600">
                        Lihat Bukti
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.ppdb.show', $item->id) }}" class="text-blue-600">
                        Verifikasi
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-slate-500">Belum ada bukti pembayaran yang diupload.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection