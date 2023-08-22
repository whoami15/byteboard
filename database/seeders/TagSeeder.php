<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Tag::factory()->count(20)->create();

        $topics = \App\Models\Topic::inRandomOrder()->get();

        $topics->each(function ($topic) {
            // Attach tags to the topic
            $tags = \App\Models\Tag::inRandomOrder()->take(random_int(1, 7))->pluck('id');

            $topic->tags()->attach($tags);
        });
    }
}
