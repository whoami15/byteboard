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
            for ($i = 0; $i < random_int(1, 3); $i++) {
                \App\Models\Comment::factory()->create([
                    'user_id' => $userIds->random(),
                    'commentable_type' => 'topic',
                    'commentable_id' => $topicId,
                ]);
            }

            $answerIds = \App\Models\Answer::where('topic_id', $topicId)->pluck('id');

            $answerIds->each(function ($answerId) use ($userIds) {
                // Add comments to random answers on the topic
                for ($i = 0; $i < random_int(3, 5); $i++) {
                    \App\Models\Comment::factory()->create([
                        'user_id' => $userIds->random(),
                        'commentable_type' => 'answer',
                        'commentable_id' => $answerId,
                    ]);
                }
            });
        });
    }
}
