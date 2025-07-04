<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100" x-data="{ desktopSidebarOpen: true }" x-cloak>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title> {{-- Menggunakan @yield('title') --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full">
    <div x-data="{ mobileSidebarOpen: false }" @keydown.window.escape="mobileSidebarOpen = false">

        {{-- Sidebar untuk Mobile --}}
        <div x-show="mobileSidebarOpen" class="relative z-40 md:hidden" role="dialog" aria-modal="true">
            <div x-show="mobileSidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
            <div class="fixed inset-0 flex z-40">
                <div x-show="mobileSidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button @click="mobileSidebarOpen = false" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none">
                            <span class="sr-only">Tutup sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                    @include('partials.sidebar_content')
                </div>
                <div class="flex-shrink-0 w-14"></div>
            </div>
        </div>

        {{-- Sidebar Desktop --}}
        <div :class="desktopSidebarOpen ? 'w-64' : 'w-20'" class="hidden md:flex md:flex-col md:fixed md:inset-y-0 bg-white border-r border-gray-200 transition-all duration-300 ease-in-out">
            @include('partials.sidebar_content')
        </div>

        <div :class="desktopSidebarOpen ? 'md:pl-64' : 'md:pl-20'" class="flex flex-col flex-1 transition-all duration-300 ease-in-out">
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow-sm">
                <button @click="desktopSidebarOpen = !desktopSidebarOpen" type="button" class="px-4 text-gray-500 focus:outline-none hover:text-gray-600 transition-colors">
                    <span class="sr-only">Buka/tutup sidebar</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <div class="flex-1 px-4 flex justify-end">
                    <div class="ml-4 flex items-center md:ml-6">
                        <span class="text-gray-600 mr-3 font-semibold">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-1 rounded-full text-gray-400 hover:text-gray-600 focus:outline-none" title="Logout">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                               </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <main class="flex-1 bg-gray-100">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        @yield('content') {{-- Menggunakan @yield('content') --}}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
