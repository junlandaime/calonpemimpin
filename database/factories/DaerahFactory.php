<?php

namespace Database\Factories;

use App\Models\Daerah;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DaerahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Daerah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->unique()->city();
        $jenis = $this->faker->randomElement(['kabupaten', 'kota']);

        return [
            'nama' => $jenis === 'kota' ? "Kota $nama" : "Kabupaten $nama",
            'jenis' => $jenis,
            'provinsi' => 'Jawa Barat',
            'luas_wilayah' => $this->faker->randomFloat(2, 30, 5000),
            'jumlah_penduduk' => $this->faker->numberBetween(100000, 5000000),
            'slug' => Str::slug($nama),
        ];
    }

    /**
     * Indicate that the daerah is a kabupaten.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function kabupaten()
    {
        return $this->state(function (array $attributes) {
            $nama = $this->faker->unique()->city();
            return [
                'nama' => "Kabupaten $nama",
                'jenis' => 'kabupaten',
                'slug' => Str::slug("kabupaten-$nama"),
            ];
        });
    }

    /**
     * Indicate that the daerah is a kota.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function kota()
    {
        return $this->state(function (array $attributes) {
            $nama = $this->faker->unique()->city();
            return [
                'nama' => "Kota $nama",
                'jenis' => 'kota',
                'slug' => Str::slug("kota-$nama"),
            ];
        });
    }

    /**
     * Indicate that the daerah has a large population.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function largePopulation()
    {
        return $this->state(function (array $attributes) {
            return [
                'jumlah_penduduk' => $this->faker->numberBetween(1000000, 5000000),
            ];
        });
    }

    /**
     * Indicate that the daerah has a small population.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function smallPopulation()
    {
        return $this->state(function (array $attributes) {
            return [
                'jumlah_penduduk' => $this->faker->numberBetween(100000, 500000),
            ];
        });
    }
}
