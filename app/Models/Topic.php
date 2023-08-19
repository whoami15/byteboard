<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bookmark> $bookmarks
 * @property-read int|null $bookmarks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Vote|null $popularComment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TopicView> $topicViews
 * @property-read int|null $topic_views_count
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static \Database\Factories\TopicFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Topic findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Topic extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $casts = [
        'user_id' => 'integer',
        'views' => 'integer',
        'accepted_answer' => 'boolean',
    ];

    protected $appends = [
        'total_votes',
        'url',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function bookmarks(): MorphMany
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    /**
     * Get the topic's most popular comment.
     */
    public function popularComment(): MorphOne
    {
        return $this->morphOne(Vote::class, 'votable')->ofMany('votes', 'max');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->using(TagTopic::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function topicViews(): HasMany
    {
        return $this->hasMany(TopicView::class);
    }

    public function trackView(): void
    {
        if (! $this->topicViews()->where('ip_address', request()->ip())->exists()) {
            $this->topicViews()->create([
                'ip_address' => request()->ip(),
            ]);

            $this->increment('views');
        }
    }

    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::limit(strip_tags($value), 200),
        );
    }

    protected function totalVotes(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->votes()->sum(DB::raw('CASE WHEN type = "upvote" THEN 1 ELSE -1 END')),
        );
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => route('topics.show', ['topic' => $this, 'slug' => $this->slug]),
        );
    }
}
