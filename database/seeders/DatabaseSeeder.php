<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\User::factory()->count(30)->create()->each(function ($user) {
            $user->topics()->saveMany(\App\Models\Topic::factory()->count(3)->make());
        });

        $this->call([
            TagSeeder::class,
            TopicSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
