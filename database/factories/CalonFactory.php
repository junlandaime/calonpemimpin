<?php

namespace Database\Factories;

use App\Models\Calon;
use App\Models\Daerah;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalonFactory extends Factory
{
    protected $model = Calon::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $firstName = $gender === 'Laki-laki' ? $this->faker->firstNameMale() : $this->faker->firstNameFemale();

        return [
            'daerah_id' => Daerah::factory(),
            'nama' => $firstName . ' ' . $this->faker->lastName(),
            'gelar_depan' => $this->faker->optional(0.7)->randomElement(['Dr.', 'Prof.', 'Ir.', 'H.', 'Hj.']),
            'gelar_belakang' => $this->faker->optional(0.5)->randomElement(['S.H.', 'M.Si.', 'M.M.', 'M.Kom.', 'Ph.D.']),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-70 years', '-35 years')->format('Y-m-d'),
            'tempat_lahir' => $this->faker->city(),
            'jenis_kelamin' => $gender,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'foto_profil' => null, // Anda bisa mengisi ini dengan path default jika diperlukan
            'pendidikan' => $this->generatePendidikan(),
            'pekerjaan' => $this->generatePekerjaan(),
            'jabatan' => $this->faker->randomElement(['Calon Walikota', 'Calon Bupati', 'Calon Wakil Walikota', 'Calon Wakil Bupati']),
            'partai' => $this->faker->company() . ' Party',
            'visi' => $this->faker->paragraph(),
            'misi' => $this->generateMisi(),
            'prestasi' => $this->generatePrestasi(),
            'program_unggulan' => $this->generateProgramUnggulan(),
            'pengalaman_organisasi' => $this->generatePengalamanOrganisasi(),
            'publikasi' => $this->generatePublikasi(),
            'media_sosial' => json_encode([
                'facebook' => 'https://facebook.com/' . $this->faker->userName(),
                'twitter' => 'https://twitter.com/' . $this->faker->userName(),
                'instagram' => 'https://instagram.com/' . $this->faker->userName(),
            ]),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }

    private function generatePendidikan()
    {
        $pendidikan = [];
        $tingkat = ['S1', 'S2', 'S3'];
        $jumlahPendidikan = $this->faker->numberBetween(1, 3);

        for ($i = 0; $i < $jumlahPendidikan; $i++) {
            $pendidikan[] = [
                'tingkat' => $tingkat[$i],
                'jurusan' => $this->faker->jobTitle(),
                'institusi' => fake()->university,
                'tahun_lulus' => $this->faker->year(),
            ];
        }

        return json_encode($pendidikan);
    }

    private function generatePekerjaan()
    {
        $pekerjaan = [];
        $jumlahPekerjaan = $this->faker->numberBetween(2, 4);

        for ($i = 0; $i < $jumlahPekerjaan; $i++) {
            $pekerjaan[] = [
                'posisi' => $this->faker->jobTitle(),
                'perusahaan' => $this->faker->company(),
                'tahun_mulai' => $this->faker->year(),
                'tahun_selesai' => $this->faker->optional(0.7)->year(),
            ];
        }

        return json_encode($pekerjaan);
    }

    private function generateMisi()
    {
        $misi = [];
        $jumlahMisi = $this->faker->numberBetween(3, 5);

        for ($i = 0; $i < $jumlahMisi; $i++) {
            $misi[] = $this->faker->sentence();
        }

        return json_encode($misi);
    }

    private function generatePrestasi()
    {
        $prestasi = [];
        $jumlahPrestasi = $this->faker->numberBetween(2, 5);

        for ($i = 0; $i < $jumlahPrestasi; $i++) {
            $prestasi[] = [
                'nama' => $this->faker->sentence(),
                'tahun' => $this->faker->year(),
                'lembaga' => $this->faker->company(),
            ];
        }

        return json_encode($prestasi);
    }

    private function generateProgramUnggulan()
    {
        $program = [];
        $jumlahProgram = $this->faker->numberBetween(3, 6);

        for ($i = 0; $i < $jumlahProgram; $i++) {
            $program[] = [
                'nama' => $this->faker->catchPhrase(),
                'deskripsi' => $this->faker->paragraph(),
            ];
        }

        return json_encode($program);
    }

    private function generatePengalamanOrganisasi()
    {
        $organisasi = [];
        $jumlahOrganisasi = $this->faker->numberBetween(2, 4);

        for ($i = 0; $i < $jumlahOrganisasi; $i++) {
            $organisasi[] = [
                'nama' => $this->faker->company(),
                'posisi' => $this->faker->jobTitle(),
                'tahun_mulai' => $this->faker->year(),
                'tahun_selesai' => $this->faker->optional(0.7)->year(),
            ];
        }

        return json_encode($organisasi);
    }

    private function generatePublikasi()
    {
        $publikasi = [];
        $jumlahPublikasi = $this->faker->numberBetween(0, 3);

        for ($i = 0; $i < $jumlahPublikasi; $i++) {
            $publikasi[] = [
                'judul' => $this->faker->sentence(),
                'penerbit' => $this->faker->company(),
                'tahun' => $this->faker->year(),
            ];
        }

        return json_encode($publikasi);
    }
}
