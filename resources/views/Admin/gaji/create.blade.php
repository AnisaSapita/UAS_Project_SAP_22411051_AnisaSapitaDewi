@extends('layouts.app')

@section('title', 'Input Gaji Baru')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    {{-- Header Halaman --}}
    <div class="mb-6 pb-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Input Data Gaji Baru</h2>
        <p class="text-sm text-gray-500 mt-1">Pilih karyawan dan masukkan detail penggajian untuk periode yang dipilih.</p>
    </div>

    <form action="{{ route('admin.gaji.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="karyawan_id" class="block font-medium text-sm text-gray-700">Karyawan</label>
                <select id="karyawan_id" name="karyawan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Pilih Karyawan</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error('karyawan_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="bulan_tahun" class="block font-medium text-sm text-gray-700">Periode Gaji (Pilih tanggal berapapun di bulan yang diinginkan)</label>
                <input type="date" id="bulan_tahun" name="bulan_tahun" value="{{ old('bulan_tahun') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                @error('bulan_tahun') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                 <div>
                    <label for="gaji_pokok" class="block font-medium text-sm text-gray-700">Gaji Pokok</label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @error('gaji_pokok') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                 <div>
                    <label for="tunjangan" class="block font-medium text-sm text-gray-700">Tunjangan</label>
                    <input type="number" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('tunjangan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                 <div>
                    <label for="potongan" class="block font-medium text-sm text-gray-700">Potongan</label>
                    <input type="number" id="potongan" name="potongan" value="{{ old('potongan', 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('potongan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-8 pt-5 border-t border-gray-200 flex items-center gap-4">
            {{-- PERUBAHAN: Mengganti kelas warna tombol --}}
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-sm text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] transition duration-150">
                Simpan
            </button>
            <a href="{{ route('admin.gaji.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
@endsection
