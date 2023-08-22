<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraphs($this->faker->numberBetween(1, 3), true),
        ];
    }
}
