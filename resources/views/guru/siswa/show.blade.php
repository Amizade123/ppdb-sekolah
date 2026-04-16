@extends('layouts.guru')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Daftar Siswa - {{ $kelas->nama_kelas }}</h1>
    <p class="text-slate-500 mt-2">Daftar siswa aktif pada kelas ini.</p>
</div>

<div class="mb-6">
    <a href="{{ route('guru.kelas.index') }}"
        class="inline-block px-4 py-2 bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition">
        ← Kembali ke Daftar Kelas
    </a>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Siswa</th>
                    <th class="p-3">NISN</th>
                    <th class="p-3">Jenis Kelamin</th>
                    <th class="p-3">Asal Sekolah</th>
                    <th class="p-3">No HP</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $index => $item)
                <tr class="border-b hover:bg-slate-50">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3 font-medium text-slate-800">{{ $item->nama_lengkap }}</td>
                    <td class="p-3">{{ $item->nisn ?? '-' }}</td>
                    <td class="p-3">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="p-3">{{ $item->asal_sekolah ?? '-' }}</td>
                    <td class="p-3">{{ $item->no_hp ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-slate-500">
                        Belum ada siswa aktif di kelas ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection