<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = \App\Models\User::inRandomOrder()->pluck('id');
        $topicIds = \App\Models\Topic::inRandomOrder()->pluck('id');

        $topicIds->each(function ($topicId) use ($userIds) {
            $answerCount = random_int(2, 7);

            for ($i = 0; $i < $answerCount; $i++) {
                \App\Models\Answer::factory()->create([
                    'user_id' => $userIds->random(),
                    'topic_id' => $topicId,
                ]);
            }

            // Randomly accept an answer
            $randomAnswer = \App\Models\Answer::where('topic_id', $topicId)->first();

            $randomAnswer->update(['accepted_answer' => true]);
        });
    }
}
