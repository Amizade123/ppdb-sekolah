@extends('layouts.guru')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Kelas yang Diajar</h1>
    <p class="text-slate-500 mt-2">Pilih kelas untuk melihat daftar siswa.</p>
</div>

@if(!$guru)
<div class="mb-6 p-4 rounded-2xl bg-yellow-50 border border-yellow-200 text-yellow-800">
    Profil guru belum tersedia. Silakan hubungi admin.
</div>
@endif

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
    @forelse($kelas as $item)
    <a href="{{ route('guru.kelas.show', $item->id) }}"
        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <h2 class="text-xl font-bold text-blue-700">{{ $item->nama_kelas }}</h2>
        <p class="text-slate-500 mt-2">Klik untuk melihat daftar siswa.</p>
    </a>
    @empty
    <div class="col-span-full bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center text-slate-500">
        Belum ada kelas yang diajar.
    </div>
    @endforelse
</div>

@endsection