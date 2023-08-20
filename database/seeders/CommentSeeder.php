<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = \App\Models\User::inRandomOrder()->pluck('id');
        $topicIds = \App\Models\Topic::inRandomOrder()->pluck('id');

        $topicIds->each(function ($topicId) use ($userIds) {
            // Add comments to the topic
            \App\Models\Comment::factory()->count(rand(1, 3))->create([
                'user_id' => $userIds->random(),
                'commentable_type' => 'topic',
                'commentable_id' => $topicId,
            ]);

            // Add comments to random answers on the topic
            $answerIds = \App\Models\Answer::where('topic_id', $topicId)->pluck('id');

            $answerIds->random(rand(2, 4))->each(function ($answerId) use ($userIds) {
                \App\Models\Comment::factory()->count(rand(1, 3))->create([
                    'user_id' => $userIds->random(),
                    'commentable_type' => 'answer',
                    'commentable_id' => $answerId,
                ]);
            });
        });
    }
}
