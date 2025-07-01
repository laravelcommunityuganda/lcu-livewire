<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use HasUuids, SoftDeletes, HasFactory;
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_pinned' => 'boolean',
            'is_locked' => 'boolean',
            'created_at' => 'datetime',
        ];
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, Thread::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    //
}
