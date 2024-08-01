@extends('layouts.calon')

@section('title', 'Daftar Calon Pemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Calon Pemimpin</h1>

        <x-breadcrumb :breadcrumbs="[['name' => 'Daftar Calon', 'url' => route('daftar-calon')]]" />

        <!-- Filter dan Pencarian -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form action="{{ route('daftar-calon') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="daerah" class="block text-sm font-medium text-gray-700 mb-1">Daerah</label>
                        <select id="daerah" name="daerah"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#90EE90] focus:border-[#90EE90]">
                            <option value="">Semua Daerah</option>
                            @foreach ($daerahs as $daerah)
                                <option value="{{ $daerah->id }}"
                                    {{ request('daerah') == $daerah->id ? 'selected' : '' }}>
                                    {{ $daerah->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div>
                        <label for="partai" class="block text-sm font-medium text-gray-700 mb-1">Partai</label>
                        <select id="partai" name="partai"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#90EE90] focus:border-[#90EE90]">
                            <option value="">Semua Partai</option>
                            @foreach ($partais as $partai)
                                <option value="{{ $partai }}" {{ request('partai') == $partai ? 'selected' : '' }}>
                                    {{ $partai }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Nama</label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama calon..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#90EE90] focus:border-[#90EE90]">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#90EE90] text-hitam font-bold py-2 px-4 rounded hover:bg-green-400 transition duration-300">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Calon -->
        @if ($calons->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8" role="alert">
                <p>Tidak ada calon yang ditemukan dengan kriteria pencarian ini. Silakan coba filter yang berbeda.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($calons as $calon)
                    <x-calon-card :calon="$calon" />
                @endforeach
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-8">
            {{ $calons->appends(request()->query())->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            // Anda bisa menambahkan JavaScript tambahan di sini jika diperlukan
            // Misalnya, untuk menangani perubahan filter secara real-time
        </script>
    @endpush
@endsection
