@extends('layouts.calon')

@section('title', $daerah->nama . ' - Detail Daerah')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-[#90EE90]">Beranda</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <a href="{{ route('daftar-daerah') }}" class="hover:text-[#90EE90]">Daftar Daerah</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li>
                    <span class="text-gray-700" aria-current="page">{{ $daerah->nama }}</span>
                </li>
            </ol>
        </nav>

        <!-- Daerah Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $daerah->nama }}</h1>
            <p class="text-gray-600 mb-4">{{ ucfirst($daerah->jenis) }} di Provinsi {{ $daerah->provinsi }}</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Luas Wilayah</h3>
                    <p class="text-2xl font-bold">{{ number_format($daerah->luas_wilayah, 2) }} km²</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Jumlah Penduduk</h3>
                    <p class="text-2xl font-bold">{{ number_format($daerah->jumlah_penduduk) }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Jumlah Calon</h3>
                    <p class="text-2xl font-bold">{{ $daerah->calons->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Daftar Calon -->
        <h2 class="text-2xl font-bold mb-6">Daftar Calon Pemimpin {{ $daerah->nama }}</h2>

        @if ($daerah->calons->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8" role="alert">
                <p class="font-bold">Belum ada calon</p>
                <p>Saat ini belum ada calon pemimpin yang terdaftar untuk {{ $daerah->nama }}.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($daerah->calons as $calon)
                    <x-calon-card :calon="$calon" />
                @endforeach
            </div>
        @endif

        <!-- Informasi Tambahan -->
        <div class="bg-white rounded-lg shadow-md p-6 mt-8">
            <h2 class="text-2xl font-bold mb-4">Informasi Tambahan</h2>
            <div class="prose max-w-none">
                <p>{{ $daerah->nama }} merupakan salah satu {{ $daerah->jenis }} di Provinsi {{ $daerah->provinsi }} yang
                    akan menyelenggarakan pemilihan kepala daerah pada tahun ini. Dengan luas wilayah
                    {{ number_format($daerah->luas_wilayah, 2) }} km² dan jumlah penduduk sebanyak
                    {{ number_format($daerah->jumlah_penduduk) }} jiwa, {{ $daerah->nama }} memiliki potensi dan tantangan
                    yang unik dalam pembangunan dan pengelolaan daerahnya.</p>

                <p class="mt-4">Para calon pemimpin yang berkompetisi di {{ $daerah->nama }} diharapkan memiliki visi dan
                    misi yang sejalan dengan kebutuhan dan aspirasi masyarakat setempat. Kami mendorong setiap warga
                    {{ $daerah->nama }} untuk mempelajari profil dan program dari masing-masing calon guna membuat
                    keputusan yang terinformasi pada hari pemilihan.</p>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-[#90EE90] rounded-lg p-6 mt-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Pelajari Lebih Lanjut</h2>
            <p class="mb-4">Ingin tahu lebih banyak tentang proses Pilkada di {{ $daerah->nama }}?</p>
            <a href="#"
                class="bg-hitam text-white font-bold py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Panduan Pilkada {{ $daerah->nama }}
            </a>
        </div>
    </div>
@endsection
