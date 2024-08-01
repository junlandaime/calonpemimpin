@extends('layouts.admin')

@section('title', 'Dashboard Admin - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Calon</h2>
                <p class="text-3xl font-bold text-[#90EE90]">{{ $totalCalons }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Daerah</h2>
                <p class="text-3xl font-bold text-[#90EE90]">{{ $totalDaerahs }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Komentar</h2>
                <p class="text-3xl font-bold text-[#90EE90]">{{ $totalKomentars }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Pengguna</h2>
                <p class="text-3xl font-bold text-[#90EE90]">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Tautan Cepat -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Tautan Cepat</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.calon.create') }}"
                    class="bg-[#90EE90] text-hitam font-semibold py-2 px-4 rounded hover:bg-green-400 transition duration-300 text-center">
                    Tambah Calon
                </a>
                <a href="{{ route('admin.daerah.create') }}"
                    class="bg-[#90EE90] text-hitam font-semibold py-2 px-4 rounded hover:bg-green-400 transition duration-300 text-center">
                    Tambah Daerah
                </a>
                <a href="{{ route('admin.komentar.index') }}"
                    class="bg-[#90EE90] text-hitam font-semibold py-2 px-4 rounded hover:bg-green-400 transition duration-300 text-center">
                    Moderasi Komentar
                </a>
                <a href="{{ route('admin.user.index') }}"
                    class="bg-[#90EE90] text-hitam font-semibold py-2 px-4 rounded hover:bg-green-400 transition duration-300 text-center">
                    Kelola Pengguna
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Calon Terbaru -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Calon Terbaru</h2>
                <ul class="divide-y divide-gray-200">
                    @foreach ($recentCalons as $calon)
                        <li class="py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ $calon->foto_profil ? asset('storage/' . $calon->foto_profil) : asset('images/default-avatar.png') }}"
                                        alt="{{ $calon->nama }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $calon->nama }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        {{ $calon->daerah->nama }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('admin.calon.edit', $calon->id) }}"
                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <a href="{{ route('admin.calon.index') }}" class="text-[#90EE90] hover:text-green-700 font-semibold">
                        Lihat semua calon →
                    </a>
                </div>
            </div>

            <!-- Komentar yang Perlu Dimoderasi -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Komentar Menunggu Moderasi</h2>
                <ul class="divide-y divide-gray-200">
                    @foreach ($pendingKomentars as $komentar)
                        <li class="py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $komentar->nama }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        {{ Str::limit($komentar->komentar, 50) }}
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.komentar.approve', $komentar->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Setuju
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.komentar.reject', $komentar->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <a href="{{ route('admin.komentar.index') }}"
                        class="text-[#90EE90] hover:text-green-700 font-semibold">
                        Moderasi semua komentar →
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
