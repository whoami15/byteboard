<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\TagTopic
 *
 * @property int|null $tag_id
 * @property int|null $topic_id
 * @property-read \App\Models\Tag|null $tag
 * @property-read \App\Models\Topic|null $topic
 * @method static \Illuminate\Database\Eloquent\Builder|TagTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|TagTopic whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TagTopic whereTopicId($value)
 * @mixin \Eloquent
 */
class TagTopic extends Pivot
{
    protected $casts = [
        'tag_id' => 'integer',
        'topic_id' => 'integer',
    ];

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
