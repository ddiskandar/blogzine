<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like($user= null)
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
}
