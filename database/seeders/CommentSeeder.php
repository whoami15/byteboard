<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $topics = \App\Models\Topic::inRandomOrder()->get();

        $topics->each(function ($topic) {
            $comments = \App\Models\Comment::factory()->count(random_int(1, 4))->create([
                'topic_id' => $topic->id,
            ]);

            // Randomly accept an answer
            $randomComment = $comments->random();
            $randomComment->update(['accepted_answer' => true]);

            // Attach tags to the topic
            $tags = \App\Models\Tag::inRandomOrder()->take(random_int(1, 4))->pluck('id');
            $topic->tags()->attach($tags);
        });
    }
}
