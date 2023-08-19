<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    public function run(): void
    {
        $comments = \App\Models\Comment::inRandomOrder()->get();

        $comments->each(function ($comment) {
            $comment->replies()->saveMany(\App\Models\Reply::factory()->count(random_int(1, 4))->make());
        });
    }
}
