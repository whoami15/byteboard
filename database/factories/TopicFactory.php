<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory()->create([
                'role' => Role::USER,
            ]),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph($this->faker->numberBetween(5, 10)),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
