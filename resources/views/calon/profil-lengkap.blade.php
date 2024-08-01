@extends('layouts.calon')

@section('title', $calon->nama . ' - Profil Lengkap')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'Daftar Calon', 'url' => route('daftar-calon')],
            ['name' => $calon->nama, 'url' => route('profil-singkat', $calon->id)],
            ['name' => 'Profil Lengkap', 'url' => route('profil-lengkap', $calon->id)],
        ]" />

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header Section -->
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-64 w-full object-cover md:w-64"
                        src="{{ $calon->foto_profil ? asset('storage/' . $calon->foto_profil) : asset('images/default-profile.jpg') }}"
                        alt="{{ $calon->nama }}">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-[#90EE90] font-semibold">{{ $calon->jabatan }}</div>
                    <h1 class="mt-1 text-4xl font-bold">{{ $calon->nama }}</h1>
                    <p class="mt-2 text-gray-600">{{ $calon->partai }}</p>
                    <p class="mt-2 text-gray-600">{{ $calon->daerah->nama }}</p>
                    <p class="mt-2 text-gray-600">Usia: {{ \Carbon\Carbon::parse($calon->tanggal_lahir)->age }} tahun</p>
                    <p class="mt-2 text-gray-600">Tempat, Tanggal Lahir: {{ $calon->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($calon->tanggal_lahir)->format('d F Y') }}</p>
                </div>
            </div>

            <!-- Visi dan Misi Section -->
            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Visi</h2>
                <p class="text-gray-700">{{ $calon->visi }}</p>
            </div>

            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Misi</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach (json_decode($calon->misi) as $misi)
                        <li>{{ $misi }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Pendidikan Section -->
            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Riwayat Pendidikan</h2>
                <ul class="space-y-4">
                    @foreach (json_decode($calon->pendidikan) as $pendidikan)
                        <li>
                            <p class="font-semibold">{{ $pendidikan->tingkat }} {{ $pendidikan->jurusan }}</p>
                            <p class="text-gray-600">{{ $pendidikan->institusi }}, Lulus Tahun
                                {{ $pendidikan->tahun_lulus }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Pekerjaan Section -->
            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Pengalaman Kerja</h2>
                <ul class="space-y-4">
                    @foreach (json_decode($calon->pekerjaan) as $pekerjaan)
                        <li>
                            <p class="font-semibold">{{ $pekerjaan->posisi }}</p>
                            <p class="text-gray-600">{{ $pekerjaan->perusahaan }}, {{ $pekerjaan->tahun_mulai }} -
                                {{ $pekerjaan->tahun_selesai ?? 'Sekarang' }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Program Unggulan Section -->
            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Program Unggulan</h2>
                <ul class="space-y-4">
                    @foreach (json_decode($calon->program_unggulan) as $program)
                        <li>
                            <h3 class="font-semibold text-lg">{{ $program->nama }}</h3>
                            <p class="text-gray-700">{{ $program->deskripsi }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Prestasi Section -->
            @if ($calon->prestasi)
                <div class="px-8 py-6 border-t border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Prestasi</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        @foreach (json_decode($calon->prestasi) as $prestasi)
                            <li>{{ $prestasi->nama }} ({{ $prestasi->tahun }}) - {{ $prestasi->lembaga }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Pengalaman Organisasi Section -->
            @if ($calon->pengalaman_organisasi)
                <div class="px-8 py-6 border-t border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Pengalaman Organisasi</h2>
                    <ul class="space-y-4">
                        @foreach (json_decode($calon->pengalaman_organisasi) as $organisasi)
                            <li>
                                <p class="font-semibold">{{ $organisasi->posisi }} - {{ $organisasi->nama }}</p>
                                <p class="text-gray-600">{{ $organisasi->tahun_mulai }} -
                                    {{ $organisasi->tahun_selesai ?? 'Sekarang' }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Publikasi Section -->
            @if ($calon->publikasi)
                <div class="px-8 py-6 border-t border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Publikasi</h2>
                    <ul class="list-disc list-inside text-gray-700">
                        @foreach (json_decode($calon->publikasi) as $publikasi)
                            <li>{{ $publikasi->judul }} ({{ $publikasi->tahun }}) - {{ $publikasi->penerbit }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Kontak dan Media Sosial Section -->
            <div class="px-8 py-6 border-t border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Kontak dan Media Sosial</h2>
                @if ($calon->email)
                    <p class="mb-2"><strong>Email:</strong> {{ $calon->email }}</p>
                @endif
                @if ($calon->nomor_telepon)
                    <p class="mb-2"><strong>Nomor Telepon:</strong> {{ $calon->nomor_telepon }}</p>
                @endif
                @if ($calon->media_sosial)
                    <div class="flex space-x-4 mt-4">
                        @php $mediaSosial = json_decode($calon->media_sosial, true); @endphp
                        @foreach ($mediaSosial as $platform => $link)
                            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                                class="text-gray-400 hover:text-gray-600">
                                @if ($platform == 'facebook')
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                @elseif($platform == 'twitter')
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                @elseif($platform == 'instagram')
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Komentar Section -->
        <div class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-8 py-6">
                <h2 class="text-2xl font-bold mb-4">Komentar</h2>
                @foreach ($calon->komentar as $komentar)
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <p class="font-semibold">{{ $komentar->nama }}</p>
                        <p class="text-gray-600 text-sm">{{ $komentar->created_at->format('d F Y H:i') }}</p>
                        <p class="mt-2">{{ $komentar->komentar }}</p>
                    </div>
                @endforeach

                <form action="{{ route('add-komentar', $calon->id) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                        <input type="text" name="nama" id="nama" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="komentar" class="block text-gray-700 text-sm font-bold mb-2">Komentar:</label>
                        <textarea name="komentar" id="komentar" rows="4" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-[#90EE90] hover:bg-green-400 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                            Kirim Komentar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Tambahkan script JavaScript di sini jika diperlukan
            // Misalnya, untuk validasi form atau fitur interaktif lainnya
        </script>
    @endpush
@endsection
