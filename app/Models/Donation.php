<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
        ];
    }

    public function donor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
