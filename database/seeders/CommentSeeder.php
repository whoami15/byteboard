<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $topics = \App\Models\Topic::inRandomOrder()->get();

        $topics->each(function ($topic) {
            $tags = \App\Models\Tag::inRandomOrder()->take(random_int(1, 4))->pluck('id');

            $topic->tags()->attach($tags);

            $comments = \App\Models\Comment::factory()->count(random_int(1, 4))->create(['topic_id' => $topic->id]);

            $randomPost = $comments->random();
            $randomPost->accepted_answer = true;
            $randomPost->save();
        });
    }
}
