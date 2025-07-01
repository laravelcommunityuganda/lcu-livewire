<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LcuJobResource extends JsonResource
{
    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'employment_type' => $this->employment_type,
            'links' => [],
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'company_description' => $this->company_description,
            'location' => $this->location,
            'salary_min' => $this->salary_min,
            'salary_max' => $this->salary_max,
            'salary_currency' => $this->salary_currency,
            'apply_url' => $this->apply_url,
            'is_remote' => $this->is_remote,
            'is_featured' => $this->is_featured,
            'expires_at' => $this->expires_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => [
                'username' => $this->user->username
            ],
        ];
    }
}
