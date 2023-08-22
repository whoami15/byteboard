<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

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

        $topic->votes()->updateOrCreate([
            'votable_id' => $topic->id,
            'user_id'=> $user->id,
        ], [
            'type' => $request->input('type'),
        ]);

        return back()->success('Your vote has been cast');
    }
}
