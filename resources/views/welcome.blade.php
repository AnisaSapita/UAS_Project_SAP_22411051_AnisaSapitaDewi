<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- BAGIAN HEAD: PENGATURAN META, JUDUL, CSS, JS, FONT -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $perusahaan->nama_perusahaan ?? 'Sistem Perusahaan' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
    <style>
        [x-cloak] { display: none !important; }
        .bg-fixed-custom {
            background-attachment: fixed;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <div class="relative min-h-screen">
        <!-- BACKGROUND GAMBAR HALAMAN UTAMA -->
        <div class="absolute inset-0 bg-cover bg-center bg-fixed-custom" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=2084');"></div>
        <!-- OVERLAY HITAM TRANSPARAN -->
        <div class="absolute inset-0 bg-black opacity-70"></div>

        <div class="relative min-h-screen flex flex-col" x-data="{ showVisiMisi: false }" x-cloak>
            <!-- NAVIGASI LOGIN DAN REGISTER -->
            <header class="w-full p-6 text-right">
                @if (Route::has('login'))
                    <nav class="flex flex-1 justify-end gap-4">
                        @auth
                            @php
                                $dashboardRoute = 'login';
                                if (Auth::user()->role == 'superadmin') $dashboardRoute = route('superadmin.dashboard');
                                elseif (Auth::user()->role == 'admin') $dashboardRoute = route('admin.dashboard');
                                elseif (Auth::user()->role == 'karyawan') $dashboardRoute = route('karyawan.dashboard');
                            @endphp
                            <a href="{{ $dashboardRoute }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70">Daftar</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="max-w-4xl w-full mx-auto px-6 flex-grow flex flex-col justify-center items-center text-center text-white">
                <!-- BAGIAN JUDUL NAMA PERUSAHAAN -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight tracking-tight mb-4 whitespace-nowrap">
                    {{ $perusahaan->nama_perusahaan ?? 'PT. Makmur Sejahtera Abadi' }}
                </h1>

                @guest
                <!-- BAGIAN TOMBOL MULAI DAN VISI MISI -->
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3 bg-[#191970] text-white font-semibold rounded-lg shadow-lg hover:bg-opacity-80 transition duration-300 ease-in-out">Mulai Sekarang</a>
                    <button @click="showVisiMisi = !showVisiMisi" type="button" class="w-full sm:w-auto px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg shadow-md hover:bg-white hover:text-[#191970] transition duration-300">
                        <span x-show="!showVisiMisi">Lihat Visi Misi</span>
                        <span x-show="showVisiMisi">Sembunyikan</span>
                    </button>
                </div>
                @endguest
            </main>

            <!-- BAGIAN VISI MISI -->
            <div x-show="showVisiMisi" x-transition class="w-full">
                @if(isset($perusahaan) && ($perusahaan->visi || $perusahaan->misi))
                <section class="w-full py-16 bg-black bg-opacity-40 backdrop-blur-sm mt-12">
                    <div class="max-w-6xl mx-auto px-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                            @if($perusahaan->visi)
                            <!-- BAGIAN VISI -->
                            <div>
                                <h3 class="text-2xl font-bold mb-4 border-l-4 border-indigo-400 pl-4 text-white">Visi</h3>
                                <p class="text-gray-200 leading-relaxed">{!! nl2br(e($perusahaan->visi)) !!}</p>
                            </div>
                            @endif
                            @if($perusahaan->misi)
                            <!-- BAGIAN MISI -->
                            <div>
                                <h3 class="text-2xl font-bold mb-4 border-l-4 border-indigo-400 pl-4 text-white">Misi</h3>
                                <p class="text-gray-200 whitespace-pre-line leading-relaxed">{!! nl2br(e($perusahaan->misi)) !!}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
                @endif
            </div>

            @isset($perusahaan)
            <!-- BAGIAN FOOTER -->
            <footer class="w-full bg-black bg-opacity-30 backdrop-blur-sm">
                <div class="max-w-6xl mx-auto px-6 pt-10 pb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-sm text-gray-200">
                        <!-- FOOTER: ALAMAT KANTOR PUSAT -->
                        <div class="text-center md:text-left">
                            <div class="flex justify-center md:justify-start items-center gap-3 mb-3">
                                <svg class="w-5 h-5 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                <h4 class="font-bold uppercase tracking-wider">Alamat Kantor Pusat</h4>
                            </div>
                            <p>{!! nl2br(e($perusahaan->alamat)) !!}</p>
                        </div>
                        <!-- FOOTER: HUBUNGI KAMI -->
                        <div class="text-center md:text-left">
                            <div class="flex justify-center md:justify-start items-center gap-3 mb-3">
                                <svg class="w-5 h-5 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                <h4 class="font-bold uppercase tracking-wider">Hubungi Kami</h4>
                            </div>
                            <div class="space-y-1">
                                <p>Telepon: {{ $perusahaan->telepon }}</p>
                                <p>Email: {{ $perusahaan->email_perusahaan }}</p>
                            </div>
                        </div>
                        <!-- FOOTER: IKUTI KAMI -->
                        <div class="text-center md:text-left">
                            <div class="flex justify-center md:justify-start items-center gap-3 mb-3">
                                <svg class="w-5 h-5 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                                <h4 class="font-bold uppercase tracking-wider">Ikuti Kami</h4>
                            </div>
                            <div class="space-y-3">
                                <a href="{{ $perusahaan->website ?? '#' }}" target="_blank" class="flex items-center justify-center md:justify-start gap-3 text-gray-300 hover:text-white">
                                    <svg class="w-5 h-5" ...></svg>
                                    <span>{{ $perusahaan->website ? str_replace(['https://', 'http://'], '', $perusahaan->website) : 'Website Resmi' }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- FOOTER COPYRIGHT -->
                    <div class="border-t border-gray-100/20 mt-8 pt-6 text-center">
                        <p class="text-sm text-gray-400">&copy; {{ date('Y') }} {{ $perusahaan->nama_perusahaan }}. All rights reserved.</p>
                    </div>
                </div>
            </footer>
            @endisset
        </div>
    </div>
</body>
</html>
