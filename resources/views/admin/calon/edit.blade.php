@extends('layouts.admin')

@section('title', 'Edit Calon Pemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Calon Pemimpin</h1>

        <form action="{{ route('admin.calon.update', $calon->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama Lengkap
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                    id="nama" type="text" name="nama" value="{{ old('nama', $calon->nama) }}" required>
                @error('nama')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="daerah_id">
                    Daerah
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('daerah_id') border-red-500 @enderror"
                    id="daerah_id" name="daerah_id" required>
                    @foreach ($daerahs as $daerah)
                        <option value="{{ $daerah->id }}"
                            {{ old('daerah_id', $calon->daerah_id) == $daerah->id ? 'selected' : '' }}>
                            {{ $daerah->nama }}
                        </option>
                    @endforeach
                </select>
                @error('daerah_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="partai">
                    Partai
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('partai') border-red-500 @enderror"
                    id="partai" type="text" name="partai" value="{{ old('partai', $calon->partai) }}" required>
                @error('partai')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="visi">
                    Visi
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('visi') border-red-500 @enderror"
                    id="visi" name="visi" rows="3" required>{{ old('visi', $calon->visi) }}</textarea>
                @error('visi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="misi">
                    Misi
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('misi') border-red-500 @enderror"
                    id="misi" name="misi" rows="5" required>{{ old('misi', $calon->misi) }}</textarea>
                @error('misi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="program_unggulan">
                    Program Unggulan
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('program_unggulan') border-red-500 @enderror"
                    id="program_unggulan" name="program_unggulan" rows="5">{{ old('program_unggulan', $calon->program_unggulan) }}</textarea>
                @error('program_unggulan')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="foto_profil">
                    Foto Profil
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('foto_profil') border-red-500 @enderror"
                    id="foto_profil" type="file" name="foto_profil" accept="image/*">
                @error('foto_profil')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                @if ($calon->foto_profil)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $calon->foto_profil) }}" alt="{{ $calon->nama }}"
                            class="w-32 h-32 object-cover rounded">
                        <p class="text-sm text-gray-600 mt-1">Foto profil saat ini</p>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-[#90EE90] hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Simpan Perubahan
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-[#90EE90] hover:text-green-800"
                    href="{{ route('admin.calon.index') }}">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Preview foto profil yang baru dipilih
        document.getElementById('foto_profil').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-32', 'h-32', 'object-cover', 'rounded', 'mt-2');
                    const container = document.getElementById('foto_profil').parentNode;
                    const existingPreview = container.querySelector('img');
                    if (existingPreview) {
                        container.removeChild(existingPreview);
                    }
                    container.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
