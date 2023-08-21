<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'excerpt' => $this->excerpt,
            'total_votes' => $this->total_votes,
            'answers_count' => $this->answers_count,
            'views' => $this->views,
            'user' => new UserResource($this->whenLoaded('user')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'answers' => AnswerResource::collection($this->whenLoaded('answers')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
