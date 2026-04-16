<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SMKS Harapan Jaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800">

    {{-- Navbar --}}
    <header class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('assets/images/logo-sekolah.png') }}" alt="Logo Sekolah" class="w-11 h-11 object-contain">
                <div>
                    <h1 class="text-lg font-bold text-blue-700">SMKS Harapan Jaya</h1>
                    <p class="text-xs text-slate-500">Cengkareng • Jakarta Barat</p>
                </div>
            </div>

            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                <a href="#keunggulan" class="hover:text-blue-600 transition">Keunggulan</a>
                <a href="#jurusan" class="hover:text-blue-600 transition">Jurusan</a>
                <a href="#ppdb" class="hover:text-blue-600 transition">PPDB</a>
                <a href="#galeri" class="hover:text-blue-600 transition">Galeri</a>
                <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl border border-slate-300 hover:bg-slate-100 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">
                    Pendaftaran
                </a>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative min-h-screen flex items-center pt-24">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/images/hero-sekolah.jpg') }}" alt="SMKS Harapan Jaya" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-slate-900/65"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-20 grid lg:grid-cols-2 gap-12 items-center text-white">
            <div>
                <span class="inline-block px-4 py-2 rounded-full bg-blue-500/20 border border-blue-300/30 text-sm mb-5">
                    PPDB Online Tahun Ajaran Baru
                </span>

                <h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                    Membangun Generasi
                    <span class="text-blue-300">Siap Kerja</span>,
                    Berkarakter, dan Kompeten
                </h2>

                <p class="text-lg text-slate-200 leading-relaxed mb-8">
                    Selamat datang di website resmi <strong>SMKS Harapan Jaya</strong>,
                    sekolah menengah kejuruan swasta di wilayah Cengkareng, Jakarta Barat,
                    yang mendukung pembelajaran vokasi, kedisiplinan, dan kesiapan dunia kerja.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" class="px-6 py-3 rounded-2xl bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg">
                        Daftar Sekarang
                    </a>
                    <a href="#tentang" class="px-6 py-3 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
                        Lihat Profil Sekolah
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-10">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10">
                        <p class="text-sm text-slate-200">Status</p>
                        <h3 class="text-2xl font-bold mt-1">Swasta</h3>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10">
                        <p class="text-sm text-slate-200">Jenjang</p>
                        <h3 class="text-2xl font-bold mt-1">SMK</h3>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10">
                        <p class="text-sm text-slate-200">Lokasi</p>
                        <h3 class="text-2xl font-bold mt-1">Jakbar</h3>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold mb-4">Penerimaan Peserta Didik Baru</h3>
                    <p class="text-slate-200 mb-6">
                        Daftar secara online, unggah berkas, pantau verifikasi, dan lanjut ke pembayaran tanpa perlu proses manual yang rumit.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">1</div>
                            <div>
                                <h4 class="font-semibold">Buat Akun</h4>
                                <p class="text-sm text-slate-200">Daftar akun siswa terlebih dahulu.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">2</div>
                            <div>
                                <h4 class="font-semibold">Isi Formulir</h4>
                                <p class="text-sm text-slate-200">Lengkapi biodata dan dokumen persyaratan.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold">3</div>
                            <div>
                                <h4 class="font-semibold">Verifikasi & Pembayaran</h4>
                                <p class="text-sm text-slate-200">Pantau status hingga resmi menjadi siswa aktif.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <img src="{{ asset('assets/images/gedung-1.jpg') }}" alt="Gedung Sekolah" class="w-full h-[420px] object-cover rounded-3xl shadow-xl">
            </div>

            <div>
                <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Tentang Sekolah</span>
                <h2 class="text-4xl font-bold mt-3 mb-6">Profil Singkat SMKS Harapan Jaya</h2>

                <p class="text-slate-600 leading-relaxed mb-5">
                    <strong>SMKS Harapan Jaya</strong> merupakan sekolah menengah kejuruan swasta yang berada di wilayah
                    <strong>Cengkareng Timur, Jakarta Barat</strong>. Sekolah ini dikenal sebagai institusi pendidikan vokasi
                    yang menekankan keterampilan, kedisiplinan, dan kesiapan lulusan menghadapi dunia kerja.
                </p>

                <p class="text-slate-600 leading-relaxed mb-8">
                    Melalui pembelajaran yang terarah, pembinaan karakter, dan dukungan kegiatan sekolah,
                    SMKS Harapan Jaya berkomitmen membentuk siswa yang tidak hanya unggul secara akademik,
                    tetapi juga siap bersaing di dunia industri dan usaha.
                </p>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border">
                        <p class="text-sm text-slate-500">NPSN</p>
                        <h3 class="text-xl font-bold text-blue-700 mt-1">20101682</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border">
                        <p class="text-sm text-slate-500">Alamat</p>
                        <h3 class="text-base font-semibold text-slate-800 mt-1">Jl. Daan Mogot KM 13</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Keunggulan --}}
    <section id="keunggulan" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center mb-14">
            <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Keunggulan</span>
            <h2 class="text-4xl font-bold mt-3">Kenapa Memilih SMKS Harapan Jaya?</h2>
            <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                Kami menghadirkan pendidikan vokasi yang menyeimbangkan kompetensi, karakter, dan kesiapan masa depan.
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-slate-50 p-8 rounded-3xl border hover:shadow-lg transition">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="text-xl font-bold mb-3">Pembelajaran Terarah</h3>
                <p class="text-slate-600">Kurikulum vokasi yang mendukung kompetensi siswa secara bertahap dan aplikatif.</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-3xl border hover:shadow-lg transition">
                <div class="text-4xl mb-4">💼</div>
                <h3 class="text-xl font-bold mb-3">Siap Dunia Kerja</h3>
                <p class="text-slate-600">Fokus pada pembentukan lulusan yang disiplin, terampil, dan siap terjun ke dunia profesional.</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-3xl border hover:shadow-lg transition">
                <div class="text-4xl mb-4">📘</div>
                <h3 class="text-xl font-bold mb-3">Administrasi Modern</h3>
                <p class="text-slate-600">Mendorong kemampuan tata kelola, administrasi, dan keterampilan kerja kantor yang rapi.</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-3xl border hover:shadow-lg transition">
                <div class="text-4xl mb-4">🤝</div>
                <h3 class="text-xl font-bold mb-3">Karakter & Disiplin</h3>
                <p class="text-slate-600">Pendidikan karakter dan budaya sekolah menjadi bagian penting dalam pembinaan siswa.</p>
            </div>
        </div>
    </section>

    {{-- Jurusan --}}
    <section id="jurusan" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Program Keahlian</span>
                <h2 class="text-4xl font-bold mt-3">Jurusan Unggulan</h2>
                <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                    Program pembelajaran dirancang untuk membekali siswa dengan keterampilan yang relevan dan siap diterapkan.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border">
                    <div class="text-5xl mb-5">🏢</div>
                    <h3 class="text-2xl font-bold mb-4">Otomatisasi dan Tata Kelola Perkantoran</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Membekali siswa dengan kemampuan administrasi perkantoran, pengarsipan, pelayanan, komunikasi bisnis,
                        dan pengelolaan dokumen secara profesional.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border">
                    <div class="text-5xl mb-5">📊</div>
                    <h3 class="text-2xl font-bold mb-4">Akuntansi dan Keuangan Lembaga</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Membekali siswa dengan keterampilan pembukuan, laporan keuangan, administrasi keuangan,
                        dan dasar-dasar pengelolaan keuangan lembaga maupun usaha.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- PPDB --}}
    <section id="ppdb" class="py-24 bg-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-semibold tracking-wide uppercase text-sm text-blue-100">PPDB Online</span>
                <h2 class="text-4xl font-bold mt-3">Alur Pendaftaran Siswa Baru</h2>
                <p class="text-blue-100 mt-4 max-w-2xl mx-auto">
                    Sistem PPDB dirancang agar proses pendaftaran menjadi lebih praktis, cepat, dan transparan.
                </p>
            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-white/10 p-8 rounded-3xl border border-white/10">
                    <div class="text-4xl mb-4">1️⃣</div>
                    <h3 class="text-xl font-bold mb-3">Buat Akun</h3>
                    <p class="text-blue-100">Calon siswa membuat akun pendaftaran secara online.</p>
                </div>

                <div class="bg-white/10 p-8 rounded-3xl border border-white/10">
                    <div class="text-4xl mb-4">2️⃣</div>
                    <h3 class="text-xl font-bold mb-3">Isi Formulir</h3>
                    <p class="text-blue-100">Lengkapi data diri dan unggah dokumen persyaratan.</p>
                </div>

                <div class="bg-white/10 p-8 rounded-3xl border border-white/10">
                    <div class="text-4xl mb-4">3️⃣</div>
                    <h3 class="text-xl font-bold mb-3">Verifikasi</h3>
                    <p class="text-blue-100">Admin memeriksa berkas dan status pendaftaran.</p>
                </div>

                <div class="bg-white/10 p-8 rounded-3xl border border-white/10">
                    <div class="text-4xl mb-4">4️⃣</div>
                    <h3 class="text-xl font-bold mb-3">Resmi Terdaftar</h3>
                    <p class="text-blue-100">Setelah pembayaran diverifikasi, siswa menjadi aktif.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Galeri --}}
    <section id="galeri" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Galeri Sekolah</span>
                <h2 class="text-4xl font-bold mt-3">Dokumentasi Sekolah</h2>
                <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                    Kamu bisa mengganti semua foto ini dengan dokumentasi sekolah asli.
                </p>
            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                <img src="{{ asset('assets/images/gedung-2.jpg') }}" alt="Galeri 1" class="w-full h-72 object-cover rounded-3xl shadow-md">
                <img src="{{ asset('assets/images/kegiatan-1.jpg') }}" alt="Galeri 2" class="w-full h-72 object-cover rounded-3xl shadow-md">
                <img src="{{ asset('assets/images/kegiatan-2.jpg') }}" alt="Galeri 3" class="w-full h-72 object-cover rounded-3xl shadow-md">
                <img src="{{ asset('assets/images/kepala-sekolah.jpg') }}" alt="Galeri 4" class="w-full h-72 object-cover rounded-3xl shadow-md">
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 bg-slate-900 text-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                Siap Menjadi Bagian dari
                <span class="text-blue-400">SMKS Harapan Jaya?</span>
            </h2>
            <p class="text-slate-300 mt-5 text-lg max-w-2xl mx-auto">
                Daftarkan dirimu sekarang dan ikuti proses PPDB online dengan mudah, cepat, dan terstruktur.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <a href="{{ route('register') }}" class="px-6 py-3 rounded-2xl bg-blue-600 text-white hover:bg-blue-700 transition">
                    Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="px-6 py-3 rounded-2xl border border-white/20 hover:bg-white/10 transition">
                    Login Akun
                </a>
            </div>
        </div>
    </section>

    {{-- Kontak --}}
    <footer id="kontak" class="bg-slate-950 text-slate-300 py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div>
                <h3 class="text-xl font-bold text-white mb-4">SMKS Harapan Jaya</h3>
                <p class="leading-relaxed text-slate-400">
                    Sekolah menengah kejuruan swasta di Cengkareng, Jakarta Barat yang berkomitmen
                    membangun lulusan berkarakter, disiplin, dan siap kerja.
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-4">Navigasi</h4>
                <ul class="space-y-2">
                    <li><a href="#tentang" class="hover:text-white">Tentang</a></li>
                    <li><a href="#jurusan" class="hover:text-white">Jurusan</a></li>
                    <li><a href="#ppdb" class="hover:text-white">PPDB</a></li>
                    <li><a href="#galeri" class="hover:text-white">Galeri</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-2 text-slate-400">
                    <li>📍 Jl. Daan Mogot KM 13, Cengkareng Timur</li>
                    <li>📞 021-5401920</li>
                    <li>✉️ smkharapanjaya@yahoo.co.id</li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-4">Akses Cepat</h4>
                <div class="flex flex-col gap-3">
                    <a href="{{ route('login') }}" class="px-4 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 transition text-white">
                        Pendaftaran Online
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-12 pt-6 border-t border-white/10 text-sm text-slate-500 flex flex-col md:flex-row justify-between gap-3">
            <p>© {{ date('Y') }} SMKS Harapan Jaya. All rights reserved.</p>
            <p>Sistem Informasi PPDB & Akademik Sekolah</p>
        </div>
    </footer>

</body>
</html>