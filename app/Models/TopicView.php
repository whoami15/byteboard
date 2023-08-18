<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\TopicView
 *
 * @property-read \App\Models\Topic $topic
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView query()
 *
 * @property int $id
 * @property int|null $topic_id
 * @property string|null $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicView whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TopicView extends Model
{
    use HasFactory;

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
