<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Sekolah' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800">

    {{-- Navbar --}}
    <header class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-blue-700">SMA Negeri Contoh</h1>
                <p class="text-sm text-slate-500">Sistem PPDB & Akademik Sekolah</p>
            </div>

            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="#beranda" class="hover:text-blue-600 transition">Beranda</a>
                <a href="#profil" class="hover:text-blue-600 transition">Profil</a>
                <a href="#ppdb" class="hover:text-blue-600 transition">PPDB</a>
                <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="/login" class="px-4 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">
                    Login
                </a>
                <a href="/register" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                    Pendaftaran
                </a>
            </div>
        </div>
    </header>

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-10 text-center">
            <h2 class="text-lg font-semibold">SMA Negeri Contoh</h2>
            <p class="text-sm text-slate-300 mt-2">
                Website PPDB & Manajemen Akademik Sekolah
            </p>
            <p class="text-xs text-slate-400 mt-4">
                © {{ date('Y') }} Semua Hak Dilindungi.
            </p>
        </div>
    </footer>

</body>

</html>