<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function excerpt(int $limit = 265)
    {
        return Str::limit(strip_tags($this->body), $limit);
    }

    public function thumbnail($width = 400, $height = 300)
    {
        if ($this->thumbnail) {
            return "https://source.unsplash.com/{$this->thumbnail}/{$width}x{$height}";
        }

        return asset('images/default-background.svg');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like($user = null)
    {
        $user = $user ?: auth()->user();

        return $this->isLikedBy($user) ? $this->likes()->detach($user) : $this->likes()->attach($user);
    }

    public function likes()
    {
        return $this->morphToMany('App\Models\User', 'likable')->withTimestamps();
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function ispublished(): bool
    {
        return ! $this->isNotpublished();
    }

    public function isNotpublished(): bool
    {
        return $this->published_at === null;
    }

    public function isApproved(): bool
    {
        return ! $this->isNotApproved();
    }

    public function isNotApproved(): bool
    {
        return $this->approved_at === null;
    }

    public function isDeclined(): bool
    {
        return ! $this->isNotDeclined();
    }

    public function isNotDeclined(): bool
    {
        return $this->declined_at === null;
    }

    public function isPublished(): bool
    {
        return ! $this->isNotPublished();
    }

    public function isNotPublished(): bool
    {
        return $this->isNotpublished() || $this->isNotApproved() || $this->isDeclined();
    }

    public function isAwaitingApproval(): bool
    {
        return $this->ispublished() && $this->isNotApproved() && $this->isNotDeclined();
    }

    public function isNotAwaitingApproval(): bool
    {
        return ! $this->isAwaitingApproval();
    }

    public function readTime()
    {
        $minutes = round(str_word_count($this->body) / 200,);

        return $minutes == 0 ? 1 : $minutes;
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query->published()
            ->orderBy('published_at', 'desc');
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->published()
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->orderBy('published_at', 'desc');
    }

    public function scopeTrending(Builder $query): Builder
    {
        return $query->published()
            ->withCount(['likes' => function ($query) {
                $query->where('created_at', '>=', now()->subWeek());
            }])
            ->orderBy('likes_count', 'desc')
            ->orderBy('published_at', 'desc');
    }

}
