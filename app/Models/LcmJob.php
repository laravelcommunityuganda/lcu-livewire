<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LcmJob extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'is_remote' => 'boolean',
            'is_featured' => 'boolean',
            'expires_at' => 'date',
        ];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }
    // public function company(): BelongsTo
    // {
    //     return $this->belongsTo(related: Company::class);
    // }
}
