<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Kepala Sekolah' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-72 bg-white shadow-lg hidden md:flex md:flex-col">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-blue-700">PPDB Sekolah</h1>
                <p class="text-sm text-slate-500 mt-1">Panel Kepala Sekolah</p>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('kepala.dashboard') }}"
                    class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100 transition">
                    📊 Dashboard
                </a>

                <a href="{{ route('kepala.siswa.index') }}"
                    class="block px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100 transition">
                    👨‍🎓 Data Siswa
                </a>
            </nav>

            <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full px-4 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 md:p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

    </div>

</body>

</html>