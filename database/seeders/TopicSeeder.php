<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $randomTopics = \App\Models\Topic::inRandomOrder()->take(20)->get();

        $randomTopics->each(function ($topic) {
            $tags = \App\Models\Tag::inRandomOrder()->take(random_int(1, 4))->pluck('id');

            $topic->tags()->attach($tags);

            $comments = \App\Models\Comment::factory()->count(3)->create(['topic_id' => $topic->id]);

            $randomPost = $comments->random();
            $randomPost->accepted_answer = true;
            $randomPost->save();
        });
    }
}
