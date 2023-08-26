<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

class VoteTopicController extends Controller
{
    public function __invoke(
        Request $request,
        Topic $topic,
        $slug = null,
    ) {
        if ($slug !== $topic->slug) {
            return to_route('topics.show', ['topic' => $topic, 'slug' => $topic->slug]);
        }

        if (! $user = $request->user()) {
            return back()->error('You need to login to cast your vote.');
        }

        $validated = $request->validate([
            'type' => [
                'required',
                Rule::in(['upvote', 'downvote']),
            ],
        ]);

        try {
            DB::transaction(function () use ($topic, $user, $validated) {
                $topic->votes()->updateOrCreate([
                    'votable_id' => $topic->id,
                    'user_id'=> $user->id,
                ], [
                    'type' => $validated['type'],
                ]);

                if ($validated['type'] === 'upvote') {
                    $topic->increment('total_votes');
                } else {
                    $topic->decrement('total_votes');
                }
            }, 3);
        }  catch (Throwable $e) {
            return back()->error('An error occurred while casting your vote.');
        }

        return back()->success('Your vote has been cast');
    }
}
