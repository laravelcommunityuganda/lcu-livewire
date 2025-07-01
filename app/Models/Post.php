<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function commentsCount(): int
    {
        return $this->comments()->count();
    }
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function likesCount(): int
    {
        return $this->likes()->count();
    }

    public function isLiked(): bool
    {
        return $this->likes()
            ->where('user_id', Auth::id())
            ->exists();
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function isBookmarked(): bool
    {
        return $this->bookmarks()
            ->where('user_id', Auth::id())
            ->exists();
    }
    public function bookmarks()
    {
        return $this->hasMany(PostBookmark::class);
    }

    public function viewsCount(): int
    {
        return $this->views()->count();
    }
    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

}
