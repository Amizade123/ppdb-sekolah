@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Jadwal Pelajaran</h1>
    <p class="text-slate-500 mt-2">Kelola jadwal pelajaran untuk setiap kelas.</p>
</div>

@if(session('success'))
<div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
    <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid lg:grid-cols-3 gap-6">

    <!-- Form -->
    <div class="lg:col-span-1 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">Tambah Jadwal</h2>

        <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Kelas</label>
                <select name="kelas_id" class="w-full border rounded-xl p-3" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Guru</label>
                <select name="guru_profile_id" class="w-full border rounded-xl p-3" required>
                    <option value="">Pilih Guru</option>
                    @foreach($guru as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_guru }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" class="w-full border rounded-xl p-3" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($mapel as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Hari</label>
                <select name="hari" class="w-full border rounded-xl p-3" required>
                    <option value="">Pilih Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="w-full border rounded-xl p-3" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="w-full border rounded-xl p-3" required>
                </div>
            </div>

            <button class="w-full px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                Simpan Jadwal
            </button>
        </form>
    </div>

    <!-- List -->
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <h2 class="text-lg font-semibold text-slate-800 mb-4">Daftar Jadwal</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-left">
                        <th class="p-3">Hari</th>
                        <th class="p-3">Kelas</th>
                        <th class="p-3">Mapel</th>
                        <th class="p-3">Guru</th>
                        <th class="p-3">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $item)
                    <tr class="border-b hover:bg-slate-50">
                        <td class="p-3">{{ $item->hari }}</td>
                        <td class="p-3">{{ $item->kelas->nama_kelas }}</td>
                        <td class="p-3">{{ $item->mapel->nama_mapel }}</td>
                        <td class="p-3">{{ $item->guru->nama_guru }}</td>
                        <td class="p-3">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-slate-500">
                            Belum ada jadwal pelajaran.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection