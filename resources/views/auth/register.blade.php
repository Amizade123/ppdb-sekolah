<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun - SMKS Harapan Jaya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100">

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Left Side -->
        <div class="hidden lg:flex relative items-center justify-center bg-slate-900 overflow-hidden">
            <img src="{{ asset('assets/images/hero-sekolah.jpg') }}"
                 alt="Sekolah"
                 class="absolute inset-0 w-full h-full object-cover opacity-30">

            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-slate-900/85 to-slate-950/90"></div>

            <div class="relative z-10 max-w-xl px-10 text-white">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 mb-8">
                    <img src="{{ asset('assets/images/logo-sekolah.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                    <div>
                        <h1 class="text-xl font-bold">SMKS Harapan Jaya</h1>
                        <p class="text-sm text-slate-300">Cengkareng • Jakarta Barat</p>
                    </div>
                </a>

                <h2 class="text-5xl font-extrabold leading-tight mb-6">
                    Pendaftaran
                    Akun Siswa Baru
                </h2>

                <p class="text-lg text-slate-200 leading-relaxed mb-8">
                    Buat akun terlebih dahulu untuk memulai proses PPDB online,
                    melengkapi formulir, mengunggah berkas, dan memantau status pendaftaran Anda.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">1</div>
                        <div>
                            <h4 class="font-semibold">Daftar Akun</h4>
                            <p class="text-sm text-slate-200">Buat akun calon siswa.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">2</div>
                        <div>
                            <h4 class="font-semibold">Isi Formulir PPDB</h4>
                            <p class="text-sm text-slate-200">Lengkapi biodata dan berkas.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">3</div>
                        <div>
                            <h4 class="font-semibold">Pantau Status</h4>
                            <p class="text-sm text-slate-200">Lihat hasil verifikasi dan pembayaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center justify-center px-6 py-10">
            <div class="w-full max-w-md">

                <div class="mb-8 text-center lg:text-left">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3 lg:hidden mb-6">
                        <img src="{{ asset('assets/images/logo-sekolah.png') }}" alt="Logo" class="w-11 h-11 object-contain">
                        <div class="text-left">
                            <h1 class="text-lg font-bold text-blue-700">SMKS Harapan Jaya</h1>
                            <p class="text-xs text-slate-500">Cengkareng • Jakarta Barat</p>
                        </div>
                    </a>

                    <h2 class="text-3xl font-bold text-slate-800">Buat Akun</h2>
                    <p class="text-slate-500 mt-2">Lengkapi data akun pendaftaran Anda.</p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8">

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input id="name"
                                   name="name"
                                   type="text"
                                   value="{{ old('name') }}"
                                   required
                                   autofocus
                                   class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none"
                                   placeholder="Masukkan nama lengkap">
                            @error('name')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                                Email
                            </label>
                            <input id="email"
                                   name="email"
                                   type="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password
                            </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   required
                                   class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none"
                                   placeholder="Minimal 8 karakter">
                            @error('password')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                                Konfirmasi Password
                            </label>
                            <input id="password_confirmation"
                                   name="password_confirmation"
                                   type="password"
                                   required
                                   class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none"
                                   placeholder="Ulangi password">
                        </div>

                        <!-- Button -->
                        <button type="submit"
                                class="w-full rounded-2xl bg-blue-600 text-white py-3 font-semibold hover:bg-blue-700 transition shadow-md">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                            Login di sini
                        </a>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ url('/') }}" class="text-sm text-slate-500 hover:text-slate-700">
                            ← Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>