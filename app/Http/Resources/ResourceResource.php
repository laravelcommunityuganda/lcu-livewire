<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResource extends JsonResource
{
    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'file_url' => $this->file_url,
            'thumbnail' => $this->thumbnail,
            'download_count' => $this->download_count,
            'type' => $this->type,
            'access_level' => $this->access_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => [
                'username' => $this->user->username,
            ],
            'links' => [],
            // 'meta' => [
            //     'current_page' => $this->resource->currentPage(),
            //     'from' => $this->resource->firstItem(),
            //     'last_page' => $this->resource->lastPage(),
            //     'links' => [
            //         'url' => route('resources.index'),
            //         'label' => 'Resources',
            //         'active' => true,
            //     ],
            //     'path' => $this->resource->path(),
            //     'per_page' => $this->resource->perPage(),
            //     'to' => $this->resource->lastItem(),
            //     'total' => $this->resource->total(),
            // ],
        ];
    }
}
