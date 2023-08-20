<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Reputation
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reputation whereValue($value)
 * @mixin \Eloquent
 */
class Reputation extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'value' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
