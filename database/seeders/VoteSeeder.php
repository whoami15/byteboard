<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = \App\Models\User::inRandomOrder()->pluck('id');
        $topicIds = \App\Models\Topic::inRandomOrder()->pluck('id');
        $answerIds = \App\Models\Answer::inRandomOrder()->pluck('id');

        $userIds->each(function ($userId) use ($topicIds, $answerIds) {
            $topicIds->random(rand(20, 40))->each(function ($topicId) use ($userId) {
                \App\Models\Vote::factory()->create([
                    'user_id' => $userId,
                    'votable_type' => 'topic',
                    'votable_id' => $topicId,
                ]);
            });

            $answerIds->random(rand(1, 3))->each(function ($answerId) use ($userId) {
                \App\Models\Vote::factory()->create([
                    'user_id' => $userId,
                    'votable_type' => 'answer',
                    'votable_id' => $answerId,
                ]);
            });
        });
    }
}
