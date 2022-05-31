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

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function excerpt(int $limit = 265)
    {
        return Str::limit(strip_tags($this->body), $limit);
    }

    public function getThumbnail()
    {
        return $this->thumbnail ?? asset('images/default-background.svg');
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

    public function readTime()
    {
        $minutes = round(str_word_count($this->body) / 200,);

        return $minutes == 0 ? 1 : $minutes;
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->whereNull('published_at');
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
            ->orderBy('views_count', 'desc')
            ->orderBy('likes_count', 'desc')
            ->orderBy('published_at', 'desc');
    }

    public function scopeTrending(Builder $query): Builder
    {
        return $query->published()
            ->withCount('likes', 'comments')
            ->orderBy('comments_count', 'desc')
            ->orderBy('views_count', 'desc')
            ->orderBy('likes_count', 'desc')
            ->orderBy('published_at', 'desc');
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function setSlugAttribute(string $slug)
    {
        $this->attributes['slug'] = $this->generateUniqueSlug($slug);
    }

    public static function findBySlug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    private function generateUniqueSlug(string $value): string
    {
        $slug = $originalSlug = Str::slug($value) ?: Str::random(5);
        $counter = 0;

        while ($this->slugExists($slug, $this->exists ? $this->id() : null)) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }

        return $slug;
    }

    private function slugExists(string $slug, int $ignoreId = null): bool
    {
        $query = $this->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }

}
