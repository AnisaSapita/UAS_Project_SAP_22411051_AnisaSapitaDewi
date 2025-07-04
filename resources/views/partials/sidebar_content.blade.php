{{-- File: resources/views/partials/sidebar_content.blade.php --}}
{{-- Struktur baru untuk isi sidebar, memisahkan header dan menu navigasi --}}

<div class="flex-1 flex flex-col min-h-0">
    {{-- Header Sidebar: Logo dan Nama --}}
    {{-- PERUBAHAN: Tinggi header disesuaikan menjadi h-16 --}}
    <div class="flex items-center h-16 flex-shrink-0 px-4 bg-white border-b border-gray-200">
        <div class="flex items-center gap-3 w-full">
            {{-- Logo Perusahaan --}}
            {{-- PERUBAHAN: Ukuran logo disesuaikan menjadi h-10 agar proporsional --}}
            <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan" class="h-10 w-auto">

            {{-- Nama Perusahaan atau Role --}}
            <span x-show="desktopSidebarOpen" class="text-gray-800 text-lg font-semibold tracking-wider transition-opacity duration-300 whitespace-nowrap">
                PT MSA
            </span>
        </div>
    </div>

    {{-- Menu Navigasi Dinamis --}}
    <div class="flex-1 flex flex-col overflow-y-auto">
        <nav class="flex-1 px-2 py-4 space-y-1">
            @if(Auth::user()->role == 'superadmin')
                {{-- Kode menu untuk Superadmin diletakkan di file ini --}}
                @include('partials.sidebar_superadmin')
            @elseif(Auth::user()->role == 'admin')
                {{-- Kode menu untuk Admin diletakkan di file ini --}}
                @include('partials.sidebar_admin')
            @elseif(Auth::user()->role == 'karyawan')
                {{-- Kode menu untuk Karyawan diletakkan di file ini --}}
                @include('partials.sidebar_karyawan')
            @endif
        </nav>
    </div>
</div>
