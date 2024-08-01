@extends('layouts.calon')

@section('title', 'Beranda - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="bg-[#90EE90] rounded-lg shadow-lg p-8 mb-12">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di CariPemimpin</h1>
            <p class="text-xl mb-6">Temukan dan pelajari tentang calon pemimpin di Jawa Barat untuk Pilkada mendatang.</p>
            <a href="{{ route('daftar-calon') }}"
                class="bg-hitam text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Lihat Daftar Calon
            </a>
        </div>

        <!-- Quick Search -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-12">
            <h2 class="text-2xl font-semibold mb-4">Cari Calon Pemimpin</h2>
            <form action="{{ route('search-calon') }}" method="GET" class="flex flex-wrap items-center">
                <input type="text" name="query" placeholder="Nama calon atau daerah..."
                    class="flex-grow mr-4 mb-4 sm:mb-0 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#90EE90]">
                <button type="submit"
                    class="bg-[#90EE90] text-hitam font-bold py-2 px-6 rounded-lg hover:bg-green-400 transition duration-300">
                    Cari
                </button>
            </form>
        </div>


        <!-- Featured Candidates -->
        <h2 class="text-3xl font-bold mb-6">Calon Pemimpin Terkemuka</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach ($featuredCalons as $calon)
                <x-calon-card :calon="$calon" />
            @endforeach
        </div>

        <!-- Statistics -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-12">
            <h2 class="text-2xl font-semibold mb-4">Statistik Pilkada Jawa Barat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center">
                    <p class="text-4xl font-bold text-[#90EE90]">{{ $totalCalons }}</p>
                    <p class="text-gray-600">Total Calon</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-[#90EE90]">{{ $totalDaerahs }}</p>
                    <p class="text-gray-600">Kabupaten/Kota</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-[#90EE90]">{{ now()->format('d M Y') }}</p>
                    <p class="text-gray-600">Tanggal Pemilihan</p>
                </div>
            </div>
        </div>

        <!-- Latest News -->
        {{-- <h2 class="text-3xl font-bold mb-6">Berita Terkini</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach ($latestNews as $news)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $news->title }}</h3>
                        <p class="text-gray-700 text-base mb-4">{{ Str::limit($news->excerpt, 100) }}</p>
                        <a href="{{ route('berita.show', $news->slug) }}"
                            class="text-[#90EE90] hover:text-green-700 font-semibold">
                            Baca selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div> --}}

        <!-- Call to Action -->
        <div class="bg-slate-700 text-white rounded-lg shadow-lg p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap untuk Memilih dengan Bijak?</h2>
            <p class="text-xl mb-6">Pelajari lebih lanjut tentang calon pemimpin dan proses Pilkada di Jawa Barat.</p>
            <a href="{{ route('pelajari') }}"
                class="bg-[#90EE90] text-hitam font-bold py-3 px-6 rounded-lg hover:bg-green-400 transition duration-300">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
@endsection
