<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $users = \App\Models\User::inRandomOrder()->get();

        $users->each(function ($user) {
            $user->topics()->saveMany(\App\Models\Topic::factory()->count(random_int(1, 2))->make());
        });
    }
}
