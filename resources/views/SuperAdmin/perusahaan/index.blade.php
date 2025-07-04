@extends('layouts.app')

@section('title', 'Manajemen Perusahaan')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Perusahaan</h2>
        <a href="{{ route('superadmin.perusahaan.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Tambah Perusahaan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">Nama Perusahaan</th>
                    <th class="py-2 px-4 text-left">Alamat</th>
                    <th class="py-2 px-4 text-left">Telepon</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perusahaans as $perusahaan)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $perusahaan->nama_perusahaan }}</td>
                        <td class="py-2 px-4">{{ Str::limit($perusahaan->alamat, 50) }}</td>
                        <td class="py-2 px-4">{{ $perusahaan->telepon }}</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('superadmin.perusahaan.edit', $perusahaan->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('superadmin.perusahaan.destroy', $perusahaan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Tidak ada data perusahaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $perusahaans->links() }}
    </div>
</div>
@endsection
