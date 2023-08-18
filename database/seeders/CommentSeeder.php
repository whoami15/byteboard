<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $randomComments = \App\Models\Comment::inRandomOrder()->take(20)->get();

        $randomComments->each(function ($comment) {
            $comment->replies()->saveMany(\App\Models\Reply::factory()->count(2)->make());
        });
    }
}
