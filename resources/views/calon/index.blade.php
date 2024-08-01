@extends('layouts.calon')

@section('title', 'Beranda')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center mb-8">Selamat Datang di CariPemimpin</h1>

        <!-- Hero Section -->
        <div class="bg-[#90EE90] rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Temukan Calon Pemimpin di Jawa Barat</h2>
            <p class="text-gray-700 mb-4">Jelajahi profil dan visi misi calon pemimpin untuk Pilkada Jawa Barat. Buat
                keputusan yang terinformasi untuk masa depan daerah kita.</p>
            <a href="{{ route('daftar-calon') }}"
                class="inline-block bg-hitam text-white font-bold py-2 px-4 rounded hover:bg-gray-800 transition duration-300">
                Lihat Semua Calon
            </a>
        </div>

        <!-- Search Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Cari Calon Pemimpin</h2>
            <form action="{{ route('search-calon') }}" method="GET" class="flex flex-wrap items-center">
                <div class="flex-grow mr-4 mb-4 sm:mb-0">
                    <input type="text" name="query" placeholder="Nama calon atau daerah..."
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#90EE90]">
                </div>
                <button type="submit"
                    class="bg-[#90EE90] text-hitam font-bold py-2 px-4 rounded hover:bg-green-400 transition duration-300">
                    Cari
                </button>
            </form>
        </div>

        <!-- Featured Candidates -->
        <h2 class="text-2xl font-semibold mb-4">Calon Pemimpin Terkemuka</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach ($featuredCalons as $calon)
                <x-calon-card :calon="$calon" />
            @endforeach
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <a href="{{ route('daftar-daerah') }}"
                class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300">
                <h3 class="font-semibold mb-2">Daftar Daerah</h3>
                <p class="text-sm text-gray-600">Lihat calon pemimpin berdasarkan daerah</p>
            </a>
            <a href="{{ route('daftar-calon') }}"
                class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300">
                <h3 class="font-semibold mb-2">Semua Calon</h3>
                <p class="text-sm text-gray-600">Jelajahi profil semua calon pemimpin</p>
            </a>
            <a href="{{ route('infografis') }}"
                class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300">
                <h3 class="font-semibold mb-2">Infografis</h3>
                <p class="text-sm text-gray-600">Visualisasi data Pilkada Jawa Barat</p>
            </a>
            <a href="{{ route('jadwal') }}"
                class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300">
                <h3 class="font-semibold mb-2">Jadwal Pilkada</h3>
                <p class="text-sm text-gray-600">Informasi waktu dan tempat pemilihan</p>
            </a>
        </div>

        <!-- Latest News -->
        {{-- <h2 class="text-2xl font-semibold mb-4">Berita Terkini</h2>
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <ul class="space-y-4">
                @foreach ($latestNews as $news)
                    <li>
                        <a href="#" class="block hover:bg-gray-50 p-2 rounded transition duration-300">
                            <h3 class="font-semibold">{{ $news->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $news->excerpt }}</p>
                            <span class="text-xs text-gray-500">{{ $news->published_at->format('d M Y') }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="mt-4 inline-block text-[#90EE90] hover:text-green-700 font-semibold">
                Lihat Semua Berita &rarr;
            </a>
        </div> --}}
    </div>
@endsection
