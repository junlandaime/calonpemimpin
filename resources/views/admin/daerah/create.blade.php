@extends('layouts.admin')

@section('title', 'Tambah Daerah Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Daerah Baru</h1>

        <form action="{{ route('admin.daerah.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama Daerah
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                    id="nama" type="text" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                    Jenis
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis') border-red-500 @enderror"
                    id="jenis" name="jenis" required>
                    <option value="">Pilih Jenis Daerah</option>
                    <option value="kabupaten" {{ old('jenis') == 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                    <option value="kota" {{ old('jenis') == 'kota' ? 'selected' : '' }}>Kota</option>
                </select>
                @error('jenis')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="provinsi">
                    Provinsi
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('provinsi') border-red-500 @enderror"
                    id="provinsi" type="text" name="provinsi" value="{{ old('provinsi', 'Jawa Barat') }}" required>
                @error('provinsi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="luas_wilayah">
                    Luas Wilayah (km²)
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('luas_wilayah') border-red-500 @enderror"
                    id="luas_wilayah" type="number" step="0.01" name="luas_wilayah" value="{{ old('luas_wilayah') }}"
                    required>
                @error('luas_wilayah')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_penduduk">
                    Jumlah Penduduk
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jumlah_penduduk') border-red-500 @enderror"
                    id="jumlah_penduduk" type="number" name="jumlah_penduduk" value="{{ old('jumlah_penduduk') }}"
                    required>
                @error('jumlah_penduduk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-[#90EE90] hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Tambah Daerah
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-[#90EE90] hover:text-green-800"
                    href="{{ route('admin.daerah.index') }}">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Jika Anda ingin menambahkan validasi JavaScript atau logika lain, Anda bisa menambahkannya di sini
        document.getElementById('nama').addEventListener('input', function(e) {
            let nama = e.target.value;
            let jenis = document.getElementById('jenis').value;
            if (jenis) {
                document.getElementById('provinsi').value = jenis.charAt(0).toUpperCase() + jenis.slice(1) + ' ' +
                    nama + ', Jawa Barat';
            }
        });

        document.getElementById('jenis').addEventListener('change', function(e) {
            let jenis = e.target.value;
            let nama = document.getElementById('nama').value;
            if (nama) {
                document.getElementById('provinsi').value = jenis.charAt(0).toUpperCase() + jenis.slice(1) + ' ' +
                    nama + ', Jawa Barat';
            }
        });
    </script>
@endpush
