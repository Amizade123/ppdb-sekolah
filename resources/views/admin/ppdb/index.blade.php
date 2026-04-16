@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Verifikasi PPDB</h1>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow p-4">
    <form method="GET" class="flex gap-4 mb-6">

        <select name="kelas_id" class="border rounded-xl p-2">
            <option value="">Semua Kelas</option>
            @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kelas }}
            </option>
            @endforeach
        </select>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-xl">
            Filter
        </button>

        <a href="{{ route('admin.export.siswa', ['kelas_id' => request('kelas_id')]) }}"
            class="px-4 py-2 bg-green-600 text-white rounded-xl">
            Export Excel
        </a>

    </form>
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Nama</th>
                <th>Status PPDB</th>
                <th>Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr class="border-b">
                <td class="p-2">{{ $item->nama_lengkap }}</td>
                <td>{{ $item->status_ppdb_label }}</td>
                <td>{{ $item->status_pembayaran_label }}</td>
                <td>
                    <a href="{{ route('admin.ppdb.show', $item->id) }}"
                        class="text-blue-600">
                        Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection