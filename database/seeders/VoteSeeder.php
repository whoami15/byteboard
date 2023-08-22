<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = \App\Models\User::inRandomOrder()->pluck('id');
        $topicIds = \App\Models\Topic::inRandomOrder()->pluck('id');
        $answerIds = \App\Models\Answer::inRandomOrder()->pluck('id');

        $topicVotes = [];
        $answerVotes = [];

        $userIds->each(function ($userId) use ($topicIds, $answerIds, &$topicVotes, &$answerVotes) {
            $topicIds->random(rand(30, 50))->each(function ($topicId) use ($userId, &$topicVotes) {
                // \App\Models\Vote::factory()->create([
                //     'user_id' => $userId,
                //     'votable_type' => 'topic',
                //     'votable_id' => $topicId,
                // ]);

                $topicVotes[] = [
                    'user_id' => $userId,
                    'votable_type' => 'topic',
                    'votable_id' => $topicId,
                    'type' => rand(0, 1) ? 'upvote' : 'downvote',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            });

            $answerIds->random(rand(3, 4))->each(function ($answerId) use ($userId, &$answerVotes) {
                // \App\Models\Vote::factory()->create([
                //     'user_id' => $userId,
                //     'votable_type' => 'answer',
                //     'votable_id' => $answerId,
                // ]);

                $answerVotes[] = [
                    'user_id' => $userId,
                    'votable_type' => 'answer',
                    'votable_id' => $answerId,
                    'type' => rand(0, 1) ? 'upvote' : 'downvote',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            });
        });

        // Insert votes in bulk
        \App\Models\Vote::insert($topicVotes);
        \App\Models\Vote::insert($answerVotes);

        $this->updateTotalVotesForTopics();
        $this->updateTotalVotesForAnswers();
    }

    protected function updateTotalVotesForTopics()
    {
        DB::table('topics')
            ->leftJoinSub(
                DB::table('votes')
                    ->selectRaw('votable_id, SUM(CASE WHEN votes.type = "upvote" THEN 1 ELSE -1 END) as vote_count')
                    ->where('votes.votable_type', '=', 'topic')
                    ->groupBy('votable_id'),
                'votes_count_subquery',
                'topics.id', '=', 'votes_count_subquery.votable_id'
            )
            ->update([
                'topics.total_votes' => DB::raw('COALESCE(votes_count_subquery.vote_count, 0)'),
            ]);
    }

    protected function updateTotalVotesForAnswers()
    {
        DB::table('answers')
            ->leftJoinSub(
                DB::table('votes')
                    ->selectRaw('votable_id, SUM(CASE WHEN votes.type = "upvote" THEN 1 ELSE -1 END) as vote_count')
                    ->where('votes.votable_type', '=', 'answer')
                    ->groupBy('votable_id'),
                'votes_count_subquery',
                'answers.id', '=', 'votes_count_subquery.votable_id'
            )
            ->update([
                'answers.total_votes' => DB::raw('COALESCE(votes_count_subquery.vote_count, 0)'),
            ]);
    }
}
