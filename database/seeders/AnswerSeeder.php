<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        $topics = \App\Models\Topic::inRandomOrder()->get();

        $topics->each(function ($topic) {
            $answers = \App\Models\Answer::factory()->count(random_int(4, 7))->create([
                'topic_id' => $topic->id,
            ]);

            // Randomly accept an answer
            $randomAnswer = $answers->random();
            $randomAnswer->update(['accepted_answer' => true]);

            // Attach tags to the topic
            $tags = \App\Models\Tag::inRandomOrder()->take(random_int(1, 7))->pluck('id');
            $topic->tags()->attach($tags);
        });
    }
}
