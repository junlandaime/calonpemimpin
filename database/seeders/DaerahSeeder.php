<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Daerah;
use Illuminate\Support\Str;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daerahs = [
            ['nama' => 'Kabupaten Bandung', 'jenis' => 'kabupaten', 'luas_wilayah' => 1767.96, 'jumlah_penduduk' => 3717291],
            ['nama' => 'Kabupaten Bandung Barat', 'jenis' => 'kabupaten', 'luas_wilayah' => 1305.77, 'jumlah_penduduk' => 1690664],
            ['nama' => 'Kabupaten Bekasi', 'jenis' => 'kabupaten', 'luas_wilayah' => 1484.37, 'jumlah_penduduk' => 3592765],
            ['nama' => 'Kabupaten Bogor', 'jenis' => 'kabupaten', 'luas_wilayah' => 2710.62, 'jumlah_penduduk' => 5965410],
            ['nama' => 'Kabupaten Ciamis', 'jenis' => 'kabupaten', 'luas_wilayah' => 1414.71, 'jumlah_penduduk' => 1175389],
            ['nama' => 'Kabupaten Cianjur', 'jenis' => 'kabupaten', 'luas_wilayah' => 3614.35, 'jumlah_penduduk' => 2270299],
            ['nama' => 'Kabupaten Cirebon', 'jenis' => 'kabupaten', 'luas_wilayah' => 990.36, 'jumlah_penduduk' => 2132876],
            ['nama' => 'Kabupaten Garut', 'jenis' => 'kabupaten', 'luas_wilayah' => 3065.19, 'jumlah_penduduk' => 2607602],
            ['nama' => 'Kabupaten Indramayu', 'jenis' => 'kabupaten', 'luas_wilayah' => 2040.11, 'jumlah_penduduk' => 1765836],
            ['nama' => 'Kabupaten Karawang', 'jenis' => 'kabupaten', 'luas_wilayah' => 1737.30, 'jumlah_penduduk' => 2336009],
            ['nama' => 'Kabupaten Kuningan', 'jenis' => 'kabupaten', 'luas_wilayah' => 1178.57, 'jumlah_penduduk' => 1068201],
            ['nama' => 'Kabupaten Majalengka', 'jenis' => 'kabupaten', 'luas_wilayah' => 1204.24, 'jumlah_penduduk' => 1205995],
            ['nama' => 'Kabupaten Pangandaran', 'jenis' => 'kabupaten', 'luas_wilayah' => 1010.00, 'jumlah_penduduk' => 407559],
            ['nama' => 'Kabupaten Purwakarta', 'jenis' => 'kabupaten', 'luas_wilayah' => 971.72, 'jumlah_penduduk' => 941016],
            ['nama' => 'Kabupaten Subang', 'jenis' => 'kabupaten', 'luas_wilayah' => 2051.76, 'jumlah_penduduk' => 1578926],
            ['nama' => 'Kabupaten Sukabumi', 'jenis' => 'kabupaten', 'luas_wilayah' => 4145.70, 'jumlah_penduduk' => 2444616],
            ['nama' => 'Kabupaten Sumedang', 'jenis' => 'kabupaten', 'luas_wilayah' => 1518.33, 'jumlah_penduduk' => 1149072],
            ['nama' => 'Kabupaten Tasikmalaya', 'jenis' => 'kabupaten', 'luas_wilayah' => 2563.35, 'jumlah_penduduk' => 1743931],
            ['nama' => 'Kota Bandung', 'jenis' => 'kota', 'luas_wilayah' => 167.67, 'jumlah_penduduk' => 2507888],
            ['nama' => 'Kota Banjar', 'jenis' => 'kota', 'luas_wilayah' => 113.49, 'jumlah_penduduk' => 190357],
            ['nama' => 'Kota Bekasi', 'jenis' => 'kota', 'luas_wilayah' => 210.49, 'jumlah_penduduk' => 2543676],
            ['nama' => 'Kota Bogor', 'jenis' => 'kota', 'luas_wilayah' => 118.50, 'jumlah_penduduk' => 1043070],
            ['nama' => 'Kota Cimahi', 'jenis' => 'kota', 'luas_wilayah' => 40.20, 'jumlah_penduduk' => 607811],
            ['nama' => 'Kota Cirebon', 'jenis' => 'kota', 'luas_wilayah' => 37.36, 'jumlah_penduduk' => 316277],
            ['nama' => 'Kota Depok', 'jenis' => 'kota', 'luas_wilayah' => 200.29, 'jumlah_penduduk' => 2406826],
            ['nama' => 'Kota Sukabumi', 'jenis' => 'kota', 'luas_wilayah' => 48.25, 'jumlah_penduduk' => 332990],
            ['nama' => 'Kota Tasikmalaya', 'jenis' => 'kota', 'luas_wilayah' => 171.61, 'jumlah_penduduk' => 663508],
        ];

        foreach ($daerahs as $daerah) {
            Daerah::create([
                'nama' => $daerah['nama'],
                'jenis' => $daerah['jenis'],
                'provinsi' => 'Jawa Barat',
                'luas_wilayah' => $daerah['luas_wilayah'],
                'jumlah_penduduk' => $daerah['jumlah_penduduk'],
                'slug' => Str::slug($daerah['nama']),
            ]);
        }
    }
}
