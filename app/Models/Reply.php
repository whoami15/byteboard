<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Reply
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $answer_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Answer|null $answer
 * @property-read \App\Models\User|null $user
 *
 * @method static \Database\Factories\ReplyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply withoutTrashed()
 *
 * @property int|null $comment_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereCommentId($value)
 *
 * @mixin \Eloquent
 */
class Reply extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'user_id' => 'integer',
        'answer_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }
}
