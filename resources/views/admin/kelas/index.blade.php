@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Kelola Kelas</h1>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="grid md:grid-cols-2 gap-6">

    {{-- Form Tambah Kelas --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Tambah Kelas</h2>

        <form action="{{ route('admin.kelas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="w-full border rounded p-2" placeholder="Contoh: 10-A" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tingkat</label>
                <input type="text" name="tingkat" class="w-full border rounded p-2" placeholder="Contoh: 10">
            </div>

            <div>
                <label class="block mb-1 font-medium">Jurusan</label>
                <input type="text" name="jurusan" class="w-full border rounded p-2" placeholder="Contoh: IPA">
            </div>

            <div>
                <label class="block mb-1 font-medium">Kapasitas</label>
                <input type="number" name="kapasitas" class="w-full border rounded p-2" value="36" required>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan Kelas
            </button>
        </form>
    </div>

    {{-- List Kelas --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Daftar Kelas</h2>

        <div class="space-y-3">
            @forelse($kelas as $item)
            <div class="border rounded-lg p-4">
                <p class="font-semibold">{{ $item->nama_kelas }}</p>
                <p class="text-sm text-slate-500">Tingkat: {{ $item->tingkat ?? '-' }}</p>
                <p class="text-sm text-slate-500">Jurusan: {{ $item->jurusan ?? '-' }}</p>
                <p class="text-sm text-slate-500">Kapasitas: {{ $item->kapasitas }}</p>
            </div>
            @empty
            <p class="text-slate-500">Belum ada data kelas.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection