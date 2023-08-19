<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['upvote', 'downvote']),
        ];
    }
}
