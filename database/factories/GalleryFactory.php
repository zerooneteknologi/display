<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gallery_name' => fake()->userName(),
            'gallery_path' => fake()->imageUrl(640, 480, 'animals', true),
            'gallery_type' => fake()->mimeType(),
        ];
    }
}
