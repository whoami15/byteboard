<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\BadgeUser
 *
 * @property int|null $user_id
 * @property int|null $badge_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Badge|null $badge
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser whereBadgeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeUser whereUserId($value)
 * @mixin \Eloquent
 */
class BadgeUser extends Pivot
{
    protected $casts = [
        'user_id' => 'integer',
        'badge_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function badge(): BelongsTo
    {
        return $this->belongsTo(Badge::class);
    }
}
