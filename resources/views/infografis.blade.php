@extends('layouts.calon')

@section('title', 'Infografis Pilkada Jawa Barat 2024 - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-[#90EE90]">Infografis Pilkada Jawa Barat 2024</h1>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-[#90EE90]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <h2 class="text-2xl font-semibold mb-2">Total Pemilih</h2>
                <p class="text-4xl font-bold text-[#90EE90]">33,5 Juta</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-[#90EE90]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <h2 class="text-2xl font-semibold mb-2">Jumlah Daerah</h2>
                <p class="text-4xl font-bold text-[#90EE90]">27</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-[#90EE90]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                <h2 class="text-2xl font-semibold mb-2">Jumlah TPS</h2>
                <p class="text-4xl font-bold text-[#90EE90]">88,736</p>
            </div>
        </div>

        <!-- Demografi Pemilih -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Demografi Pemilih</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold mb-2">Berdasarkan Jenis Kelamin</h3>
                    <div class="flex items-center mb-2">
                        <div class="w-1/2">Laki-laki</div>
                        <div class="w-1/2 bg-gray-200 rounded-full h-4">
                            <div class="bg-blue-500 rounded-full h-4" style="width: 49%;"></div>
                        </div>
                        <div class="ml-2">49%</div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2">Perempuan</div>
                        <div class="w-1/2 bg-gray-200 rounded-full h-4">
                            <div class="bg-pink-500 rounded-full h-4" style="width: 51%;"></div>
                        </div>
                        <div class="ml-2">51%</div>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Berdasarkan Kelompok Usia</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <div class="w-1/3">17-25 tahun</div>
                            <div class="w-2/3 bg-gray-200 rounded-full h-4">
                                <div class="bg-green-500 rounded-full h-4" style="width: 30%;"></div>
                            </div>
                            <div class="ml-2">30%</div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1/3">26-40 tahun</div>
                            <div class="w-2/3 bg-gray-200 rounded-full h-4">
                                <div class="bg-yellow-500 rounded-full h-4" style="width: 35%;"></div>
                            </div>
                            <div class="ml-2">35%</div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1/3">41-60 tahun</div>
                            <div class="w-2/3 bg-gray-200 rounded-full h-4">
                                <div class="bg-red-500 rounded-full h-4" style="width: 25%;"></div>
                            </div>
                            <div class="ml-2">25%</div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1/3">>60 tahun</div>
                            <div class="w-2/3 bg-gray-200 rounded-full h-4">
                                <div class="bg-purple-500 rounded-full h-4" style="width: 10%;"></div>
                            </div>
                            <div class="ml-2">10%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Calon -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Statistik Calon</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <h3 class="font-semibold mb-2">Total Calon</h3>
                    <p class="text-3xl font-bold text-[#90EE90]">102</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <h3 class="font-semibold mb-2">Rata-rata Usia</h3>
                    <p class="text-3xl font-bold text-[#90EE90]">48 tahun</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <h3 class="font-semibold mb-2">Calon Perempuan</h3>
                    <p class="text-3xl font-bold text-[#90EE90]">32%</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <h3 class="font-semibold mb-2">Calon Incumbent</h3>
                    <p class="text-3xl font-bold text-[#90EE90]">40%</p>
                </div>
            </div>
        </div>

        <!-- Partisipasi Pemilih -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Partisipasi Pemilih (Pilkada Sebelumnya)</h2>
            <div class="flex items-center justify-center">
                <div class="w-64 h-64 rounded-full bg-gray-200 flex items-center justify-center relative">
                    <div
                        class="w-48 h-48 rounded-full bg-[#90EE90] flex items-center justify-center text-white text-4xl font-bold">
                        73%
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                        <svg class="w-64 h-64" viewBox="0 0 36 36">
                            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                fill="none" stroke="#4CAF50" stroke-width="2" stroke-dasharray="73, 100" />
                        </svg>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4">Target partisipasi Pilkada 2024: 77.5%</p>
        </div>
    </div>
@endsection
