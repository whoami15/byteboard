<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Vote
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $votable_type
 * @property int $votable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @property-read Model|Eloquent $votable
 *
 * @method static \Database\Factories\VoteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVotableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote whereVotableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vote withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vote withoutTrashed()
 *
 * @mixin Eloquent
 * @mixin \Eloquent
 */
class Vote extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'user_id' => 'integer',
        'votable_id' => 'integer',
    ];

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
