<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $users = \App\Models\User::inRandomOrder()->get();
        $topics = \App\Models\Topic::inRandomOrder()->get();
        $comments = \App\Models\Comment::inRandomOrder()->get();

        $users->each(function ($user) use ($topics, $comments) {
            $topics->random(rand(20, 40))->each(function ($topic) use ($user) {
                $user->votes()->save(\App\Models\Vote::factory()->create([
                    'votable_id' => $topic->id,
                    'votable_type' => 'topic',
                ]));
            });

            $comments->random(rand(1, 3))->each(function ($comment) use ($user) {
                $user->votes()->save(\App\Models\Vote::factory()->create([
                    'votable_id' => $comment->id,
                    'votable_type' => 'comment',
                ]));
            });
        });
    }
}
