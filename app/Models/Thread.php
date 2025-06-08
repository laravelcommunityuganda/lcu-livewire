<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasUuids, SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function latestPost(): HasOne
    {
        return $this->hasOne(Post::class)->latest();
    }
    public function firstPost(): HasOne
    {
        return $this->hasOne(Post::class)->oldest();
    }
    public function getExcerptAttribute()
    {
        return strip_tags($this->firstPost->content ?? '');
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getLatestPostCreatedAtAttribute()
    {
        return $this->latestPost->created_at->diffForHumans() ?? 'No posts yet';
    }
}
