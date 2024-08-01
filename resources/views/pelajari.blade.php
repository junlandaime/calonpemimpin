@extends('layouts.calon')

@section('title', 'Pelajari Lebih Lanjut tentang Pilkada - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-[#90EE90]">Pelajari Lebih Lanjut tentang Pilkada</h1>

        <!-- Pengantar -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Apa itu Pilkada?</h2>
            <p class="text-gray-700 mb-4">
                Pilkada (Pemilihan Kepala Daerah) adalah proses pemilihan langsung oleh rakyat untuk memilih Gubernur,
                Bupati, dan Walikota sebagai kepala pemerintah daerah di Indonesia. Pilkada merupakan wujud demokrasi di
                tingkat lokal yang memungkinkan masyarakat untuk berpartisipasi dalam menentukan pemimpin daerahnya.
            </p>
        </div>

        <!-- Tahapan Pilkada -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8" x-data="{ openTab: 1 }">
            <h2 class="text-2xl font-semibold mb-4">Tahapan Pilkada</h2>
            <div class="mb-4">
                <nav class="flex space-x-4">
                    <button @click="openTab = 1" :class="{ 'bg-[#90EE90] text-white': openTab === 1 }"
                        class="px-4 py-2 rounded-md">Persiapan</button>
                    <button @click="openTab = 2" :class="{ 'bg-[#90EE90] text-white': openTab === 2 }"
                        class="px-4 py-2 rounded-md">Pelaksanaan</button>
                    <button @click="openTab = 3" :class="{ 'bg-[#90EE90] text-white': openTab === 3 }"
                        class="px-4 py-2 rounded-md">Penyelesaian</button>
                </nav>
            </div>
            <div x-show="openTab === 1">
                <h3 class="font-semibold mb-2">Tahap Persiapan</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Perencanaan program dan anggaran</li>
                    <li>Penyusunan peraturan penyelenggaraan Pilkada</li>
                    <li>Pemuktahiran data dan daftar pemilih</li>
                    <li>Pendaftaran dan verifikasi peserta Pilkada</li>
                </ul>
            </div>
            <div x-show="openTab === 2">
                <h3 class="font-semibold mb-2">Tahap Pelaksanaan</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Kampanye</li>
                    <li>Laporan dan audit dana kampanye</li>
                    <li>Pengadaan dan pendistribusian perlengkapan pemungutan dan penghitungan suara</li>
                    <li>Pemungutan dan penghitungan suara</li>
                    <li>Rekapitulasi hasil penghitungan suara</li>
                </ul>
            </div>
            <div x-show="openTab === 3">
                <h3 class="font-semibold mb-2">Tahap Penyelesaian</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Penetapan pasangan calon terpilih</li>
                    <li>Penyelesaian sengketa hasil Pilkada</li>
                    <li>Evaluasi dan pelaporan tahapan</li>
                    <li>Pelantikan kepala daerah terpilih</li>
                </ul>
            </div>
        </div>

        <!-- Cara Menjadi Pemilih yang Terinformasi -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Cara Menjadi Pemilih yang Terinformasi</h2>
            <ol class="list-decimal list-inside space-y-4">
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Pelajari profil calon</span>
                    <p class="mt-2">Cari informasi tentang latar belakang, pengalaman, dan prestasi masing-masing calon.
                    </p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Pahami visi dan misi</span>
                    <p class="mt-2">Baca dan bandingkan visi dan misi setiap calon untuk memahami rencana pembangunan
                        mereka.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Ikuti debat calon</span>
                    <p class="mt-2">Tonton debat antar calon untuk melihat bagaimana mereka menyampaikan ide dan merespon
                        pertanyaan.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Verifikasi informasi</span>
                    <p class="mt-2">Pastikan informasi yang Anda terima akurat dengan memeriksa sumber-sumber terpercaya.
                    </p>
                </li>
                <li>
                    <span class="font-semibold">Diskusikan dengan orang lain</span>
                    <p class="mt-2">Bertukar pikiran dengan keluarga dan teman dapat membantu Anda mendapatkan perspektif
                        baru.</p>
                </li>
            </ol>
        </div>

        <!-- FAQ -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Pertanyaan Umum seputar Pilkada</h2>
            <div x-data="{ selected: null }">
                <ul class="space-y-2">
                    <li class="border-b border-gray-200 pb-2">
                        <button @click="selected !== 1 ? selected = 1 : selected = null"
                            class="flex justify-between items-center w-full text-left">
                            <span class="font-semibold">Siapa yang berhak memilih dalam Pilkada?</span>
                            <svg :class="{ 'rotate-180': selected == 1 }" class="w-5 h-5 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="selected == 1" class="mt-2">
                            Warga Negara Indonesia yang berusia minimal 17 tahun atau sudah/pernah menikah, dan terdaftar
                            sebagai pemilih di daerah tersebut.
                        </div>
                    </li>
                    <li class="border-b border-gray-200 pb-2">
                        <button @click="selected !== 2 ? selected = 2 : selected = null"
                            class="flex justify-between items-center w-full text-left">
                            <span class="font-semibold">Apa yang harus dibawa saat memilih?</span>
                            <svg :class="{ 'rotate-180': selected == 2 }" class="w-5 h-5 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="selected == 2" class="mt-2">
                            KTP elektronik atau Surat Keterangan (Suket) dan surat undangan memilih (Form C6) jika ada.
                        </div>
                    </li>
                    <li>
                        <button @click="selected !== 3 ? selected = 3 : selected = null"
                            class="flex justify-between items-center w-full text-left">
                            <span class="font-semibold">Bagaimana jika saya belum terdaftar sebagai pemilih?</span>
                            <svg :class="{ 'rotate-180': selected == 3 }" class="w-5 h-5 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="selected == 3" class="mt-2">
                            Segera hubungi kantor KPU setempat atau akses situs resmi KPU untuk mendaftarkan diri sebagai
                            pemilih sebelum batas waktu yang ditentukan.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @endpush
@endsection
