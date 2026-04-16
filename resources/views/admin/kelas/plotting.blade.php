@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Plotting Kelas Siswa Aktif</h1>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow p-4">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Nama</th>
                <th>NISN</th>
                <th>Kelas Saat Ini</th>
                <th>Assign Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $item)
            <tr class="border-b">
                <td class="p-2">{{ $item->nama_lengkap }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->kelas?->nama_kelas ?? 'Belum ada kelas' }}</td>
                <td>
                    <form action="{{ route('admin.kelas.assign', $item->id) }}" method="POST" class="flex gap-2 items-center">
                        @csrf
                        @method('PUT')

                        <select name="kelas_id" class="border rounded p-2">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $kls)
                            <option value="{{ $kls->id }}" {{ $item->kelas_id == $kls->id ? 'selected' : '' }}>
                                {{ $kls->nama_kelas }}
                            </option>
                            @endforeach
                        </select>

                        <button class="px-3 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-slate-500">
                    Belum ada siswa aktif untuk dipetakan ke kelas.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection