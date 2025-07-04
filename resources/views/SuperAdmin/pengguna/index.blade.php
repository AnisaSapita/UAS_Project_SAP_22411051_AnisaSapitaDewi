@extends('layouts.app')

@section('title', 'Manajemen Akses Admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
            <p class="font-bold">Berhasil!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Pengguna dengan Akses Admin</h2>
            <p class="text-sm text-gray-500 mt-1">Ini adalah daftar pengguna yang memiliki hak untuk mengelola data operasional.</p>
        </div>
        {{-- PERUBAHAN: Mengganti kelas warna tombol --}}
        <a href="{{ route('superadmin.pengguna.create') }}" class="px-4 py-2 bg-[#191970] text-white rounded-md font-semibold hover:bg-opacity-90 transition duration-300">
            + Tambah Admin
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            {{-- PERUBAHAN: Memberi sentuhan warna pada header tabel --}}
            <thead class="bg-[#191970]/5">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Nama</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Tanggal Dibuat</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-[#191970] uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($penggunas as $pengguna)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 whitespace-nowrap font-medium text-gray-900">{{ $pengguna->name }}</td>
                        <td class="py-3 px-4 whitespace-nowrap text-gray-600">{{ $pengguna->email }}</td>
                        <td class="py-3 px-4 whitespace-nowrap text-gray-600">{{ $pengguna->created_at->format('d F Y') }}</td>
                        <td class="py-3 px-4 flex justify-center gap-4">
                            {{-- PERUBAHAN: Menyesuaikan warna link Edit --}}
                            <a href="{{ route('superadmin.pengguna.edit', $pengguna->id) }}" class="text-[#191970] hover:underline font-semibold">Edit</a>
                            <form action="{{ route('superadmin.pengguna.destroy', $pengguna->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus admin ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="h-10 w-10 text-gray-300 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.176-5.97m8.352 5.97l-3.265-3.265A6.002 6.002 0 0012 9.5a6 6 0 10-6 6" />
                                </svg>
                                <span>Belum ada pengguna admin yang terdaftar.</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $penggunas->links() }}
    </div>
</div>
@endsection
