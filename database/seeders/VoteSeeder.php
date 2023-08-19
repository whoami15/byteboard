<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = \App\Models\User::inRandomOrder()->pluck('id');
        $topicIds = \App\Models\Topic::inRandomOrder()->pluck('id');
        $commentIds = \App\Models\Comment::inRandomOrder()->pluck('id');

        $userIds->each(function ($userId) use ($topicIds, $commentIds) {
            $topicIds->random(rand(20, 40))->each(function ($topicId) use ($userId) {
                \App\Models\Vote::factory()->create([
                    'user_id' => $userId,
                    'votable_id' => $topicId,
                    'votable_type' => 'topic',
                ]);
            });

            $commentIds->random(rand(1, 3))->each(function ($commentId) use ($userId) {
                \App\Models\Vote::factory()->create([
                    'user_id' => $userId,
                    'votable_id' => $commentId,
                    'votable_type' => 'comment',
                ]);
            });
        });
    }
}
