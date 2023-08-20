<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $answers = \App\Models\Answer::inRandomOrder()->get();

        $answers->each(function ($answer) {
            $answer->comments()->saveMany(\App\Models\Comment::factory()->count(random_int(1, 4))->make());
        });
    }
}
