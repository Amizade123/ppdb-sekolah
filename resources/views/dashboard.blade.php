<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Dashboard Siswa
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-200 p-8">
                <h1 class="text-2xl font-bold text-blue-700 mb-3">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-slate-600 mb-8">
                    Ini adalah dashboard awal sistem PPDB & Akademik Sekolah.
                    Nantinya halaman ini akan dibedakan sesuai status siswa.
                </p>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-blue-700 mb-2">Status Pendaftaran</h3>
                        <p class="text-slate-700">Belum Diverifikasi</p>
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-yellow-700 mb-2">Status Pembayaran</h3>
                        <p class="text-slate-700">Belum Bayar</p>
                    </div>

                    <div class="bg-green-50 border border-green-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-green-700 mb-2">Tahun Ajaran</h3>
                        <p class="text-slate-700">2026 / 2027</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>