@extends('layouts.app')

@section('title', 'Manajemen Karyawan')

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
            <h2 class="text-xl font-semibold text-gray-800">Daftar Karyawan</h2>
            <p class="text-sm text-gray-500 mt-1">Karyawan baru akan muncul di sini setelah mereka mendaftar mandiri.</p>
        </div>
        {{-- Tombol "Tambah Karyawan" sudah dihapus sesuai alur kerja baru --}}
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            {{-- PERUBAHAN: Menyesuaikan warna header tabel --}}
            <thead class="bg-[#191970]/5">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Nama Lengkap</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Jabatan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Tgl Bergabung</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-[#191970] uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($karyawans as $karyawan)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $karyawan->nama_lengkap }}</td>
                        <td class="py-3 px-4">{{ $karyawan->user->email }}</td>
                        <td class="py-3 px-4">
                            {{-- Memberi tanda visual jika jabatan masih default --}}
                            @if($karyawan->jabatan == 'Karyawan Baru')
                                <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">
                                    {{ $karyawan->jabatan }}
                                </span>
                            @else
                                {{ $karyawan->jabatan }}
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $karyawan->tanggal_bergabung ? $karyawan->tanggal_bergabung->format('d M Y') : 'N/A' }}</td>
                        <td class="py-3 px-4 flex justify-center gap-4">
                            {{-- PERUBAHAN: Mengganti kelas warna link Edit --}}
                            <a href="{{ route('admin.karyawan.edit', $karyawan->id) }}" class="text-[#191970] hover:underline font-semibold">Edit</a>
                            <form action="{{ route('admin.karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus karyawan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500">Tidak ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $karyawans->links() }}
    </div>
</div>
@endsection
