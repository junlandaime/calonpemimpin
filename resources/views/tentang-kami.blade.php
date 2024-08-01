@extends('layouts.calon')

@section('title', 'Tentang Kami - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-grebg-green-300">Tentang CariPemimpin</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Visi Kami</h2>
            <p class="text-gray-700 mb-4">
                CariPemimpin bertujuan untuk menjadi sumber informasi terpercaya dan komprehensif tentang calon pemimpin di
                Jawa Barat,
                memungkinkan masyarakat untuk membuat keputusan yang terinformasi dalam pemilihan kepala daerah.
            </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Misi Kami</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Menyediakan informasi akurat dan tidak bias tentang calon pemimpin</li>
                <li>Meningkatkan transparansi dalam proses politik di tingkat daerah</li>
                <li>Mendorong partisipasi aktif warga dalam proses demokrasi</li>
                <li>Memfasilitasi dialog konstruktif antara calon pemimpin dan masyarakat</li>
                <li>Meningkatkan literasi politik di kalangan pemilih</li>
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Siapa Kami</h2>
            <p class="text-gray-700 mb-4">
                CariPemimpin adalah inisiatif independen yang didirikan oleh sekelompok warga Jawa Barat yang peduli
                terhadap kualitas kepemimpinan di daerah. Tim kami terdiri dari profesional di bidang jurnalisme,
                teknologi informasi, kebijakan publik, dan pendidikan kewarganegaraan.
            </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Komitmen Kami</h2>
            <p class="text-gray-700 mb-4">
                Kami berkomitmen untuk:
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Menjaga netralitas dan objektivitas dalam penyajian informasi</li>
                <li>Memverifikasi setiap informasi sebelum dipublikasikan</li>
                <li>Menghormati privasi calon pemimpin sesuai dengan etika jurnalisme</li>
                <li>Terus memperbarui dan meningkatkan platform sesuai dengan kebutuhan masyarakat</li>
                <li>Menjadi mitra masyarakat dalam mewujudkan demokrasi yang sehat di Jawa Barat</li>
            </ul>
        </div>

        <div class="bg-green-300 text-white rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Bergabung dengan Kami</h2>
            <p class="mb-4">
                Kami percaya bahwa demokrasi yang sehat membutuhkan partisipasi aktif dari seluruh lapisan masyarakat.
                Jika Anda tertarik untuk berkontribusi atau berkolaborasi dengan CariPemimpin, jangan ragu untuk menghubungi
                kami.
            </p>
            <a href="{{ route('kontak') }}"
                class="inline-block bg-white text-green-300 font-bold py-2 px-4 rounded hover:bg-gray-100 transition duration-300">
                Hubungi Kami
            </a>
        </div>
    </div>
@endsection
