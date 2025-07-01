<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    /** @use HasFactory<\Database\Factories\PostLikeFactory> */
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    protected $casts = [
        'is_liked' => 'boolean',
        'is_disliked' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLikedByUser($query, $userId)
    {
        return $query->where('user_id', $userId)->where('is_liked', true);
    }

    public function scopeDislikedByUser($query, $userId)
    {
        return $query->where('user_id', $userId)->where('is_liked', false);
    }

    public function toggleLike($userId)
    {
        $like = $this->likedByUser($userId)->first();

        if ($like) {
            $like->delete();
        } else {
            $this->create([
                'user_id' => $userId,
                'is_liked' => true,
            ]);
        }
    }
}
