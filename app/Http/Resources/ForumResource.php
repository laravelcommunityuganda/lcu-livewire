<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
{
    public static $warp = false;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'threads_count' => $this->threads->count(),
            'replies_count' => 0,
            'is_pinned' => $this->is_pinned,
            'is_locked' => $this->is_locked,
            'created_at' => $this->create_date,
        ];
    }
}
