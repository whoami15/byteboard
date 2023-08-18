<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraphs($this->faker->numberBetween(1, 3), true),
            'excerpt' => $this->faker->sentence(),
        ];
    }
}
