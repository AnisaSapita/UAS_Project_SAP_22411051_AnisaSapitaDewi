@extends('layouts.app')

@section('title', 'Edit Data Gaji')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <form action="{{ route('admin.gaji.update', $gaji->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label for="karyawan_id" class="block font-medium text-sm text-gray-700">Karyawan</label>
                {{-- Di-disable karena tidak seharusnya diubah saat edit --}}
                <select id="karyawan_id" name="karyawan_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>
                    <option>{{ $gaji->karyawan->nama_lengkap }}</option>
                </select>
            </div>
            <div>
                <label for="bulan_tahun" class="block font-medium text-sm text-gray-700">Periode Gaji</label>
                <input type="date" id="bulan_tahun" name="bulan_tahun" value="{{ old('bulan_tahun', $gaji->bulan_tahun->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('bulan_tahun') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                 <div>
                    <label for="gaji_pokok" class="block font-medium text-sm text-gray-700">Gaji Pokok</label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $gaji->gaji_pokok) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    @error('gaji_pokok') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                 <div>
                    <label for="tunjangan" class="block font-medium text-sm text-gray-700">Tunjangan</label>
                    <input type="number" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', $gaji->tunjangan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('tunjangan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                 <div>
                    <label for="potongan" class="block font-medium text-sm text-gray-700">Potongan</label>
                    <input type="number" id="potongan" name="potongan" value="{{ old('potongan', $gaji->potongan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('potongan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Perbarui</button>
            <a href="{{ route('admin.gaji.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
