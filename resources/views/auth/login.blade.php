<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMKS Harapan Jaya</title>
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
                    Selamat Datang
                    di Portal Akademik
                </h2>

                <p class="text-lg text-slate-200 leading-relaxed mb-8">
                    Masuk ke akun Anda untuk memantau status pendaftaran, pembayaran,
                    pembagian kelas, serta informasi akademik sekolah.
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/10">
                        <p class="text-sm text-slate-300">PPDB</p>
                        <h3 class="text-2xl font-bold mt-1">Online</h3>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/10">
                        <p class="text-sm text-slate-300">Akses</p>
                        <h3 class="text-2xl font-bold mt-1">Multi Role</h3>
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

                    <h2 class="text-3xl font-bold text-slate-800">Login Akun</h2>
                    <p class="text-slate-500 mt-2">Masukkan email dan password Anda.</p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8">

                    @if (session('status'))
                        <div class="mb-4 rounded-xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

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
                                   autofocus
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
                                   placeholder="Masukkan password">
                            @error('password')
                                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember -->
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                                <input type="checkbox" name="remember" class="rounded border-slate-300">
                                Ingat saya
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Button -->
                        <button type="submit"
                                class="w-full rounded-2xl bg-blue-600 text-white py-3 font-semibold hover:bg-blue-700 transition shadow-md">
                            Masuk Sekarang
                        </button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                            Daftar di sini
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