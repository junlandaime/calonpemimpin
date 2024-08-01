@extends('layouts.calon')

@section('title', 'Daftar Kabupaten/Kota di Jawa Barat')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Kabupaten/Kota di Jawa Barat</h1>

        <x-breadcrumb :breadcrumbs="[['name' => 'Daftar Daerah', 'url' => route('daftar-daerah')]]" />

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" id="search-daerah" placeholder="Cari kabupaten/kota..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#90EE90]">
        </div>

        <!-- Daftar Daerah -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="daerah-list">
            @foreach ($daerahs as $daerah)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 daerah-item">
                    <a href="{{ route('detail-daerah', $daerah->id) }}">
                        <h2 class="text-xl font-semibold mb-2">{{ $daerah->nama }}</h2>
                    </a>

                    <p class="text-gray-600 mb-4">Jumlah Calon: {{ $daerah->calons_count }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            @if ($daerah->jenis == 'kota')
                                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                Kota
                            @else
                                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Kabupaten
                            @endif
                        </span>
                        <a href="{{ route('daftar-calon', ['daerah' => $daerah->id]) }}"
                            class="text-[#90EE90] hover:text-green-700 font-semibold">
                            Lihat Calon &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $daerahs->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            const searchInput = document.getElementById('search-daerah');
            const daerahList = document.getElementById('daerah-list');
            const daerahItems = daerahList.getElementsByClassName('daerah-item');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                Array.from(daerahItems).forEach(item => {
                    const daerahName = item.getElementsByTagName('h2')[0].textContent.toLowerCase();
                    if (daerahName.includes(searchTerm)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection
