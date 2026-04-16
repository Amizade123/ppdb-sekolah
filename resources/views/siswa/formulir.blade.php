@extends('layouts.siswa')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-2">Formulir PPDB Siswa</h1>
    <p class="text-slate-500">
        Lengkapi seluruh data berikut dengan benar untuk proses pendaftaran siswa baru.
    </p>
</div>

{{-- Flash Success --}}
@if(session('success'))
<div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
    {{ session('success') }}
</div>
@endif

{{-- Error Validation --}}
@if ($errors->any())
<div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
    <p class="font-semibold mb-2">Terdapat kesalahan pada form:</p>
    <ul class="list-disc pl-5 space-y-1 text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('siswa.formulir.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf

    {{-- Data Diri --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-800">1. Data Diri Siswa</h2>
            <p class="text-sm text-slate-500 mt-1">Isi identitas pribadi calon siswa.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama_lengkap"
                    value="{{ old('nama_lengkap', $data->nama_lengkap ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama lengkap">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">NISN</label>
                <input
                    type="text"
                    name="nisn"
                    value="{{ old('nisn', $data->nisn ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan NISN">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tempat Lahir</label>
                <input
                    type="text"
                    name="tempat_lahir"
                    value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: Bandung">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir</label>
                <input
                    type="date"
                    name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', isset($data->tanggal_lahir) ? \Carbon\Carbon::parse($data->tanggal_lahir)->format('Y-m-d') : '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin</label>
                <select
                    name="jenis_kelamin"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Agama</label>
                <select
                    name="agama"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Agama</option>
                    @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ old('agama', $data->agama ?? '') == $agama ? 'selected' : '' }}>
                        {{ $agama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-2">Alamat Lengkap</label>
                <textarea
                    name="alamat"
                    rows="4"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat', $data->alamat ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nomor HP Siswa</label>
                <input
                    type="text"
                    name="no_hp_siswa"
                    value="{{ old('no_hp_siswa', $data->no_hp_siswa ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="08xxxxxxxxxx">
            </div>
        </div>
    </div>

    {{-- Data Orang Tua --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-800">2. Data Orang Tua / Wali</h2>
            <p class="text-sm text-slate-500 mt-1">Isi data orang tua atau wali siswa.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Ayah</label>
                <input
                    type="text"
                    name="nama_ayah"
                    value="{{ old('nama_ayah', $data->nama_ayah ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama ayah">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Ibu</label>
                <input
                    type="text"
                    name="nama_ibu"
                    value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama ibu">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ayah</label>
                <input
                    type="text"
                    name="pekerjaan_ayah"
                    value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: Wiraswasta">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ibu</label>
                <input
                    type="text"
                    name="pekerjaan_ibu"
                    value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: Ibu Rumah Tangga">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nomor HP Wali / Orang Tua</label>
                <input
                    type="text"
                    name="no_hp_wali"
                    value="{{ old('no_hp_wali', $data->no_hp_wali ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="08xxxxxxxxxx">
            </div>
        </div>
    </div>

    {{-- Data Asal Sekolah --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-800">3. Data Asal Sekolah</h2>
            <p class="text-sm text-slate-500 mt-1">Isi informasi sekolah asal siswa.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Sekolah Asal</label>
                <input
                    type="text"
                    name="asal_sekolah"
                    value="{{ old('asal_sekolah', $data->asal_sekolah ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama sekolah asal">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tahun Lulus</label>
                <input
                    type="number"
                    name="tahun_lulus"
                    value="{{ old('tahun_lulus', $data->tahun_lulus ?? '') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Contoh: 2026">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-2">Alamat Sekolah Asal</label>
                <textarea
                    name="alamat_sekolah"
                    rows="4"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan alamat sekolah asal">{{ old('alamat_sekolah', $data->alamat_sekolah ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Upload Dokumen --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-800">4. Upload Dokumen</h2>
            <p class="text-sm text-slate-500 mt-1">Upload dokumen persyaratan dalam format PDF/JPG/PNG.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Kartu Keluarga (KK)</label>
                <input type="file" name="file_kk" class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Akta Kelahiran</label>
                <input type="file" name="file_akta" class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Ijazah / SKL</label>
                <input type="file" name="file_ijazah" class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Pas Foto</label>
                <input type="file" name="file_foto" class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">
            </div>
        </div>
    </div>

    {{-- Tombol --}}
    <div class="flex flex-wrap gap-4">
        <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
            Simpan Formulir
        </button>

        <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl bg-slate-200 text-slate-700 font-semibold hover:bg-slate-300 transition">
            Kembali ke Dashboard
        </a>
    </div>
</form>

@endsection