<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs($this->faker->numberBetween(5, 10), true),
            'excerpt' => $this->faker->sentence(),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
