@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <p class="text-sm font-semibold text-blue-600 tracking-wide uppercase">Admin Panel</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-800">Master Mata Pelajaran</h1>
                <p class="mt-2 text-slate-500">
                    Kelola data mata pelajaran untuk kebutuhan jadwal pelajaran, guru, dan akademik sekolah.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 shadow-sm">
            <div class="font-semibold mb-2">Terjadi kesalahan:</div>
            <ul class="list-disc pl-5 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Mini Stats --}}
        <div class="grid md:grid-cols-3 gap-5 mb-8">
            <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">
                <p class="text-sm text-slate-500">Total Mata Pelajaran</p>
                <h3 class="mt-2 text-3xl font-bold text-slate-800">{{ $mapels->count() }}</h3>
            </div>

            <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">
                <p class="text-sm text-slate-500">Kelompok Umum</p>
                <h3 class="mt-2 text-3xl font-bold text-blue-600">
                    {{ $mapels->where('kelompok', 'Umum')->count() }}
                </h3>
            </div>

            <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm">
                <p class="text-sm text-slate-500">Kejuruan / Produktif</p>
                <h3 class="mt-2 text-3xl font-bold text-emerald-600">
                    {{ $mapels->whereIn('kelompok', ['Kejuruan', 'Produktif'])->count() }}
                </h3>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- Form Tambah --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sticky top-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-slate-800">Tambah Mata Pelajaran</h2>
                        <p class="text-sm text-slate-500 mt-1">
                            Tambahkan mata pelajaran baru agar dapat dipilih saat membuat jadwal.
                        </p>
                    </div>

                    <form action="{{ route('admin.mapel.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Kode Mapel</label>
                            <input type="text"
                                name="kode_mapel"
                                value="{{ old('kode_mapel') }}"
                                class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 outline-none"
                                placeholder="Contoh: MAT001">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Mata Pelajaran</label>
                            <input type="text"
                                name="nama_mapel"
                                value="{{ old('nama_mapel') }}"
                                required
                                class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 outline-none"
                                placeholder="Contoh: Matematika">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Kelompok</label>
                            <select name="kelompok"
                                class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 outline-none">
                                <option value="">-- Pilih Kelompok --</option>
                                <option value="Umum" {{ old('kelompok') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                <option value="Kejuruan" {{ old('kelompok') == 'Kejuruan' ? 'selected' : '' }}>Kejuruan</option>
                                <option value="Produktif" {{ old('kelompok') == 'Produktif' ? 'selected' : '' }}>Produktif</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full rounded-2xl bg-blue-600 px-5 py-3 text-white font-semibold hover:bg-blue-700 transition shadow-sm">
                            Simpan Mata Pelajaran
                        </button>
                    </form>
                </div>
            </div>

            {{-- Tabel Data --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800">Daftar Mata Pelajaran</h2>
                            <p class="text-sm text-slate-500 mt-1">Semua mata pelajaran yang tersedia di sistem.</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="bg-slate-100 text-slate-700">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold">No</th>
                                    <th class="px-6 py-4 text-left font-semibold">Kode</th>
                                    <th class="px-6 py-4 text-left font-semibold">Nama Mata Pelajaran</th>
                                    <th class="px-6 py-4 text-left font-semibold">Kelompok</th>
                                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @forelse($mapels as $index => $mapel)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-slate-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 font-medium text-slate-700">
                                        {{ $mapel->kode_mapel ?: '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-slate-800">
                                        {{ $mapel->nama_mapel }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                        $badgeClass = match($mapel->kelompok) {
                                        'Umum' => 'bg-blue-100 text-blue-700 border-blue-200',
                                        'Kejuruan' => 'bg-amber-100 text-amber-700 border-amber-200',
                                        'Produktif' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                        default => 'bg-slate-100 text-slate-700 border-slate-200'
                                        };
                                        @endphp

                                        <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-semibold {{ $badgeClass }}">
                                            {{ $mapel->kelompok ?: 'Belum diatur' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                onclick="document.getElementById('editModal{{ $mapel->id }}').classList.remove('hidden')"
                                                class="rounded-xl bg-yellow-100 px-3 py-2 text-xs font-semibold text-yellow-700 hover:bg-yellow-200 transition">
                                                Edit
                                            </button>

                                            <form action="{{ route('admin.mapel.destroy', $mapel->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-xl bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200 transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Modal Edit --}}
                                        <div id="editModal{{ $mapel->id }}"
                                            class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center px-4">
                                            <div class="w-full max-w-lg rounded-3xl bg-white p-6 shadow-2xl">
                                                <div class="mb-5 flex items-center justify-between">
                                                    <div>
                                                        <h3 class="text-xl font-bold text-slate-800">Edit Mata Pelajaran</h3>
                                                        <p class="text-sm text-slate-500 mt-1">Perbarui data mata pelajaran.</p>
                                                    </div>
                                                    <button
                                                        onclick="document.getElementById('editModal{{ $mapel->id }}').classList.add('hidden')"
                                                        class="text-2xl text-slate-400 hover:text-slate-700">
                                                        &times;
                                                    </button>
                                                </div>

                                                <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST" class="space-y-5">
                                                    @csrf
                                                    @method('PUT')

                                                    <div>
                                                        <label class="block text-sm font-medium text-slate-700 mb-2">Kode Mapel</label>
                                                        <input type="text"
                                                            name="kode_mapel"
                                                            value="{{ $mapel->kode_mapel }}"
                                                            class="w-full rounded-2xl border border-slate-300 px-4 py-3">
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Mata Pelajaran</label>
                                                        <input type="text"
                                                            name="nama_mapel"
                                                            value="{{ $mapel->nama_mapel }}"
                                                            required
                                                            class="w-full rounded-2xl border border-slate-300 px-4 py-3">
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-medium text-slate-700 mb-2">Kelompok</label>
                                                        <select name="kelompok" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
                                                            <option value="">-- Pilih Kelompok --</option>
                                                            <option value="Umum" {{ $mapel->kelompok == 'Umum' ? 'selected' : '' }}>Umum</option>
                                                            <option value="Kejuruan" {{ $mapel->kelompok == 'Kejuruan' ? 'selected' : '' }}>Kejuruan</option>
                                                            <option value="Produktif" {{ $mapel->kelompok == 'Produktif' ? 'selected' : '' }}>Produktif</option>
                                                        </select>
                                                    </div>

                                                    <div class="flex justify-end gap-3 pt-2">
                                                        <button type="button"
                                                            onclick="document.getElementById('editModal{{ $mapel->id }}').classList.add('hidden')"
                                                            class="rounded-2xl border border-slate-300 px-5 py-3 text-slate-700 hover:bg-slate-50 transition">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="rounded-2xl bg-blue-600 px-5 py-3 text-white hover:bg-blue-700 transition">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                        Belum ada data mata pelajaran.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection