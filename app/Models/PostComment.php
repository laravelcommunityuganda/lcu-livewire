<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    /** @use HasFactory<\Database\Factories\PostCommentFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
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
    public function parent()
    {
        return $this->belongsTo(PostComment::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(PostComment::class, 'parent_id');
    }
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
    public function scopeForPost($query, $postId)
    {
        return $query->where('post_id', $postId);
    }
    public function scopeForUserAndPost($query, $userId, $postId)
    {
        return $query->where('user_id', $userId)
            ->where('post_id', $postId);
    }
    public function scopeForParent($query, $parentId)
    {
        return $query->where('parent_id', $parentId);
    }
    public function scopeForChild($query, $childId)
    {
        return $query->where('id', $childId);
    }
}
