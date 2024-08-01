<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'office' => $this->faker->name,
            'party' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'image' => $this->faker->imageUrl(200, 200, 'people'),
            'twitter' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'background' => $this->faker->paragraphs(3, true),
            'policies' => [
                [
                    'title' => 'Economic Growth',
                    'description' => $this->faker->paragraph,
                ],
                [
                    'title' => 'Education Reform',
                    'description' => $this->faker->paragraph,
                ],
                [
                    'title' => 'Healthcare Access',
                    'description' => $this->faker->paragraph,
                ],
                [
                    'title' => 'Environmental Protection',
                    'description' => $this->faker->paragraph,
                ],
            ],
            'experience' => [
                [
                    'title' => $this->faker->jobTitle,
                    'period' => $this->faker->year . '-' . $this->faker->year,
                    'description' => $this->faker->paragraph,
                ],
                [
                    'title' => $this->faker->jobTitle,
                    'period' => $this->faker->year . '-' . $this->faker->year,
                    'description' => $this->faker->paragraph,
                ],
                [
                    'title' => $this->faker->jobTitle,
                    'period' => $this->faker->year . '-' . $this->faker->year,
                    'description' => $this->faker->paragraph,
                ],
            ],
            'voting_record' => [
                'intro' => $this->faker->paragraph,
                'items' => [
                    $this->faker->sentence,
                    $this->faker->sentence,
                    $this->faker->sentence,
                    $this->faker->sentence,
                    $this->faker->sentence,
                ],
            ],
        ];
    }
}
