<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    public function run(): void
    {
        $answers = \App\Models\Answer::inRandomOrder()->get();

        $answers->each(function ($answer) {
            $answer->replies()->saveMany(\App\Models\Reply::factory()->count(random_int(1, 4))->make());
        });
    }
}
