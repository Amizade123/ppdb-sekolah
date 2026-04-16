@extends('layouts.guru')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Jadwal Mengajar</h1>
    <p class="text-slate-500 mt-2">Daftar jadwal mengajar Anda.</p>
</div>

@if(!$guru)
<div class="mb-6 p-4 rounded-2xl bg-yellow-50 border border-yellow-200 text-yellow-800">
    Profil guru belum tersedia. Silakan hubungi admin.
</div>
@endif

<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="p-3">Hari</th>
                    <th class="p-3">Jam</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $item)
                <tr class="border-b hover:bg-slate-50">
                    <td class="p-3">{{ $item->hari }}</td>
                    <td class="p-3">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                    <td class="p-3">{{ $item->kelas->nama_kelas ?? '-' }}</td>
                    <td class="p-3">{{ $item->mapel->nama_mapel ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-slate-500">
                        Belum ada jadwal mengajar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection