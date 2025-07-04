{{-- File: resources/views/partials/sidebar_karyawan.blade.php --}}
{{-- Menu navigasi khusus untuk role Karyawan --}}

{{-- Link Menu Dashboard --}}
<a href="{{ route('karyawan.dashboard') }}" title="Dashboard"
   class="group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-150
          {{ request()->routeIs('karyawan.dashboard')
             ? 'bg-[#191970]/10 text-[#191970] font-bold'
             : 'text-gray-600 hover:bg-gray-100 hover:text-[#191970]' }}">
    <svg class="flex-shrink-0 h-6 w-6 transition-colors duration-150
               {{ request()->routeIs('karyawan.dashboard') ? 'text-[#191970]' : 'text-gray-400 group-hover:text-[#191970]' }}"
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>
    <span class="ml-3 flex-1" x-show="desktopSidebarOpen">Dashboard</span>
</a>

{{-- Link Menu Cuti Saya --}}
<a href="{{ route('karyawan.cuti.index') }}" title="Cuti Saya"
   class="group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-150
          {{ request()->routeIs('karyawan.cuti.*')
             ? 'bg-[#191970]/10 text-[#191970] font-bold'
             : 'text-gray-600 hover:bg-gray-100 hover:text-[#191970]' }}">
    <svg class="flex-shrink-0 h-6 w-6 transition-colors duration-150
               {{ request()->routeIs('karyawan.cuti.*') ? 'text-[#191970]' : 'text-gray-400 group-hover:text-[#191970]' }}"
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    <span class="ml-3 flex-1" x-show="desktopSidebarOpen">Cuti Saya</span>
</a>

{{-- Link Menu Gaji Saya --}}
<a href="{{ route('karyawan.gaji.index') }}" title="Gaji Saya"
   class="group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-150
          {{ request()->routeIs('karyawan.gaji.*')
             ? 'bg-[#191970]/10 text-[#191970] font-bold'
             : 'text-gray-600 hover:bg-gray-100 hover:text-[#191970]' }}">
    <svg class="flex-shrink-0 h-6 w-6 transition-colors duration-150
               {{ request()->routeIs('karyawan.gaji.*') ? 'text-[#191970]' : 'text-gray-400 group-hover:text-[#191970]' }}"
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span class="ml-3 flex-1" x-show="desktopSidebarOpen">Gaji Saya</span>
</a>

{{-- Link Menu Profil Saya --}}
<a href="{{ route('profile.edit') }}" title="Profil Saya"
   class="group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-150
          {{ request()->routeIs('profile.edit')
             ? 'bg-[#191970]/10 text-[#191970] font-bold'
             : 'text-gray-600 hover:bg-gray-100 hover:text-[#191970]' }}">
     <svg class="flex-shrink-0 h-6 w-6 transition-colors duration-150
                {{ request()->routeIs('profile.edit') ? 'text-[#191970]' : 'text-gray-400 group-hover:text-[#191970]' }}"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
       <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="ml-3 flex-1" x-show="desktopSidebarOpen">Profil Saya</span>
</a>
