@extends('layouts.calon')

@section('title', 'Jadwal Pilkada Jawa Barat 2024 - CariPemimpin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center text-[#90EE90]">Jadwal Pilkada Jawa Barat 2024</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Tanggal-tanggal Penting</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Pendaftaran Pemilih</h3>
                    <p>1 Januari - 31 Maret 2024</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Pendaftaran Calon</h3>
                    <p>1 April - 30 April 2024</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Masa Kampanye</h3>
                    <p>1 Juni - 5 Desember 2024</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Masa Tenang</h3>
                    <p>6 Desember - 8 Desember 2024</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Hari Pemungutan Suara</h3>
                    <p>9 Desember 2024</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Pengumuman Hasil</h3>
                    <p>20 Desember 2024</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Tahapan Pilkada</h2>
            <ol class="list-decimal list-inside space-y-4">
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Persiapan</span>
                    <p class="mt-2">Pembentukan badan penyelenggara, perencanaan program dan anggaran, penyusunan
                        peraturan penyelenggaraan Pilkada.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Pendaftaran Pemilih</span>
                    <p class="mt-2">Pemutakhiran data pemilih dan penyusunan daftar pemilih.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Pencalonan</span>
                    <p class="mt-2">Pendaftaran dan verifikasi calon, penetapan calon.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Kampanye</span>
                    <p class="mt-2">Pelaksanaan kampanye, debat publik/terbuka antar calon.</p>
                </li>
                <li class="pb-4 border-b border-gray-200">
                    <span class="font-semibold">Pemungutan dan Penghitungan Suara</span>
                    <p class="mt-2">Pelaksanaan pemungutan suara, penghitungan suara, dan rekapitulasi hasil penghitungan
                        suara.</p>
                </li>
                <li>
                    <span class="font-semibold">Penetapan Calon Terpilih dan Pelantikan</span>
                    <p class="mt-2">Penetapan pasangan calon terpilih, penyelesaian sengketa hasil Pilkada, dan
                        pelantikan.</p>
                </li>
            </ol>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Informasi Penting</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Pastikan Anda terdaftar sebagai pemilih. Cek status Anda di website resmi KPU atau TPS terdekat.</li>
                <li>Siapkan KTP elektronik atau Surat Keterangan (Suket) dan surat undangan memilih (Form C6) sebelum hari
                    pemungutan suara.</li>
                <li>Pelajari profil dan visi misi calon pemimpin sebelum memberikan suara Anda.</li>
                <li>Jaga ketertiban dan kedamaian selama proses Pilkada berlangsung.</li>
                <li>Laporkan jika Anda menemukan pelanggaran atau kecurangan kepada panitia pengawas Pilkada.</li>
            </ul>
        </div>
    </div>
@endsection
