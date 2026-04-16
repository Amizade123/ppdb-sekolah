@extends('layouts.kepala')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Data Siswa</h1>
    <p class="text-slate-500 mt-2">Monitoring seluruh data siswa sekolah.</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-6">
    <form method="GET" class="flex flex-col md:flex-row gap-4 items-start md:items-center">
        <select name="kelas_id" class="border rounded-xl p-3">
            <option value="">Semua Kelas</option>
            @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kelas }}
            </option>
            @endforeach
        </select>

        <button class="px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
            Filter
        </button>

        <a href="{{ route('kepala.siswa.export', ['kelas_id' => request('kelas_id')]) }}"
            class="px-5 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition">
            Export Excel
        </a>
    </form>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NISN</th>
                    <th class="p-3">JK</th>
                    <th class="p-3">Asal Sekolah</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Status PPDB</th>
                    <th class="p-3">Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $index => $item)
                <tr class="border-b hover:bg-slate-50">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3 font-medium text-slate-800">{{ $item->nama_lengkap }}</td>
                    <td class="p-3">{{ $item->nisn ?? '-' }}</td>
                    <td class="p-3">{{ $item->jenis_kelamin == 'L' ? 'L' : 'P' }}</td>
                    <td class="p-3">{{ $item->asal_sekolah ?? '-' }}</td>
                    <td class="p-3">{{ $item->kelas->nama_kelas ?? '-' }}</td>
                    <td class="p-3">{{ ucfirst($item->status_ppdb) }}</td>
                    <td class="p-3">{{ ucfirst(str_replace('_', ' ', $item->status_pembayaran)) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-6 text-center text-slate-500">
                        Data siswa belum tersedia.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection