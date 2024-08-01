<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calon;
use App\Models\Daerah;

class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Memastikan ada setidaknya satu calon untuk setiap daerah
        Daerah::all()->each(function ($daerah) {
            Calon::factory()->create([
                'daerah_id' => $daerah->id,
            ]);
        });

        // Menambahkan calon tambahan secara acak
        Calon::factory()->count(50)->create();

        // Membuat beberapa calon dengan data spesifik
        $this->createSpecificCalon();
    }

    /**
     * Membuat calon dengan data spesifik.
     *
     * @return void
     */
    private function createSpecificCalon()
    {
        Calon::factory()->create([
            'nama' => 'Dr. Anisa Wijaya',
            'gelar_depan' => 'Dr.',
            'gelar_belakang' => 'M.Si.',
            'jenis_kelamin' => 'Perempuan',
            'jabatan' => 'Calon Walikota',
            'partai' => 'Partai Kemajuan Bersama',
            'visi' => 'Menjadikan kota ini sebagai pusat inovasi dan kesejahteraan masyarakat',
            'misi' => json_encode([
                'Meningkatkan kualitas pendidikan dan kesehatan',
                'Mengembangkan ekonomi kreatif dan digital',
                'Mewujudkan tata kelola pemerintahan yang bersih dan transparan',
                'Membangun infrastruktur berkelanjutan dan ramah lingkungan'
            ]),
            'program_unggulan' => json_encode([
                [
                    'nama' => 'Smart City Initiative',
                    'deskripsi' => 'Mengintegrasikan teknologi informasi dalam pelayanan publik dan manajemen kota'
                ],
                [
                    'nama' => 'Green City Program',
                    'deskripsi' => 'Meningkatkan ruang terbuka hijau dan menerapkan kebijakan ramah lingkungan'
                ],
                [
                    'nama' => 'Inkubator UMKM Digital',
                    'deskripsi' => 'Mendukung pengembangan UMKM melalui platform digital dan pelatihan'
                ]
            ])
        ]);

        Calon::factory()->create([
            'nama' => 'H. Ahmad Sutanto',
            'gelar_depan' => 'H.',
            'gelar_belakang' => 'S.E.',
            'jenis_kelamin' => 'Laki-laki',
            'jabatan' => 'Calon Bupati',
            'partai' => 'Partai Persatuan Rakyat',
            'visi' => 'Membangun daerah yang mandiri, sejahtera, dan berbudaya',
            'misi' => json_encode([
                'Meningkatkan pemberdayaan ekonomi masyarakat desa',
                'Melestarikan dan mengembangkan budaya lokal',
                'Meningkatkan kualitas pendidikan dan kesehatan masyarakat',
                'Membangun infrastruktur yang merata dan berkualitas'
            ]),
            'program_unggulan' => json_encode([
                [
                    'nama' => 'Desa Mandiri Program',
                    'deskripsi' => 'Mengembangkan potensi desa melalui pemberdayaan masyarakat dan BUMDes'
                ],
                [
                    'nama' => 'Revitalisasi Pasar Tradisional',
                    'deskripsi' => 'Memodernisasi pasar tradisional tanpa menghilangkan ciri khasnya'
                ],
                [
                    'nama' => 'Festival Budaya Tahunan',
                    'deskripsi' => 'Menyelenggarakan festival budaya untuk mempromosikan kearifan lokal'
                ]
            ])
        ]);
    }
}
