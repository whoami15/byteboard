<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return inertia()->render('Topics/Index', [
            'topics' => Topic::with('user:id,username,name,profile_photo_path,default_avatar')->latest()->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Topic $topic, $slug = null)
    {
        if ($slug !== $topic->slug) {
            return to_route('topics.show', ['topic' => $topic, 'slug' => $topic->slug]);
        }

        $topic->trackView();

        $topic->load([
            'user',
            'tags',
            'comments' => [
                'user',
                'replies' => [
                    'user',
                ],
            ],
        ]);

        return inertia()->render('Topics/Show', [
            'topic' => $topic->load('user'),
        ]);
    }

    public function edit(Topic $topic)
    {
        //
    }

    public function update(Request $request, Topic $topic)
    {
        //
    }

    public function destroy(Topic $topic)
    {
        //
    }
}
