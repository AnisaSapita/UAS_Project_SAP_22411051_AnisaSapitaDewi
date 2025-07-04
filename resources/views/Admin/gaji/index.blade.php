@extends('layouts.app')

@section('title', 'Manajemen Gaji')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Data Gaji Karyawan</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola dan lihat riwayat penggajian untuk semua karyawan.</p>
        </div>
        {{-- PERUBAHAN: Menyesuaikan gaya dan warna tombol --}}
        <a href="{{ route('admin.gaji.create') }}" class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-sm text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] transition duration-150">
            Input Gaji Baru
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            {{-- PERUBAHAN: Menyesuaikan warna header tabel --}}
            <thead class="bg-[#191970]/5">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Nama Karyawan</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Periode</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Total Gaji</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-[#191970] uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($gajis as $gaji)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $gaji->karyawan->nama_lengkap }}</td>
                        <td class="py-3 px-4">{{ $gaji->bulan_tahun->format('F Y') }}</td>
                        <td class="py-3 px-4">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 flex justify-center gap-4">
                            {{-- PERUBAHAN: Menyesuaikan warna link Edit --}}
                            <a href="{{ route('admin.gaji.edit', $gaji->id) }}" class="text-[#191970] hover:underline font-semibold">Edit</a>
                            <form action="{{ route('admin.gaji.destroy', $gaji->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data gaji ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">Tidak ada data gaji.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
     <div class="mt-4">
        {{ $gajis->links() }}
    </div>
</div>
@endsection
