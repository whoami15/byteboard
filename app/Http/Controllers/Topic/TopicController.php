<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::query()
            ->with([
                'user:id,username,email,name,profile_photo_path,default_avatar',
                'tags',
            ])
            ->withCount(['answers'])
            ->latest()
            ->paginate(15)
            ->onEachSide(1);

        return inertia()->render('Topics/Index', [
            'topics' => TopicResource::collection($topics),
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
            'user:id,username,email,name,profile_photo_path,default_avatar',
            'tags',
            'comments' => [
                'user:id,username,email,name,profile_photo_path,default_avatar',
            ],
            'answers' => [
                'user:id,username,email,name,profile_photo_path,default_avatar',
                'comments' => [
                    'user:id,username,email,name,profile_photo_path,default_avatar',
                ],
            ],
        ])->loadCount(['answers']);

        // dd($topic->toArray());

        return inertia()->render('Topics/Show', [
            'topic' => new TopicResource($topic),
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
