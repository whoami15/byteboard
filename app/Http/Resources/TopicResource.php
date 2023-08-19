<?php

namespace App\Http\Resources;

use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
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
            'excerpt' => $this->excerpt,
            'total_votes' => $this->total_votes,
            'comments_count' => $this->comments_count,
            'views' => $this->views,
            'user' => new UserResource($this->whenLoaded('user')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'created_at' => $this->created_at,
        ];
    }
}
