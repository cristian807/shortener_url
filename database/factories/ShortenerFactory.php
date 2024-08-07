<?php

namespace Database\Factories;

use App\Utils\ShotenerGenerate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShortenerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_url'=> ShotenerGenerate::generateCode(),
            'origin_url' => fake()->url(),
            'new_url' =>fake()->url(),
        ];
    }
}
