<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'tags' => $this->tags->pluck('name'),
            'type' => $this->type,
            'user' => [
                // 'id' => $this->user->id,
                'username' => $this->user->username,
                'email' => $this->user->email,
            ],
            'category' => [
                'id' => $this->category_id,
                'name' => $this->category->name,
            ],
            'comments' => $this->comments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'user' => [
                        'username' => $comment->user->username,
                        'email' => $comment->user->email,
                    ],
                    'can_edit' => $comment->user_id === Auth::id(),
                    'can_delete' => $comment->user_id === Auth::id(), //|| auth()->
                    'created_at' => $comment->created_at,
                ];
            }),
            'comments_count' => $this->commentsCount(),
            'likes_count' => $this->likesCount(),
            'is_liked' => $this->isLiked(),
            'is_bookmarked' => $this->isBookmarked(),
            'views_count' => $this->viewsCount(),
            'is_draft' => $this->is_draft,
            'is_archived' => $this->is_archived,
            'is_featured' => $this->is_featured,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
            // 'meta' => $this->meta,
            // 'seo' => [
            //     'title' => $this->seo_title,
            //     'description' => $this->seo_description,
            //     'keywords' => $this->seo_keywords,
            //     'canonical_url' => $this->seo_canonical_url,
            //     'robots' => $this->seo_robots,
            // ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
