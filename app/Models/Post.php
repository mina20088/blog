<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Post extends Model
{
    use HasUlids, Prunable;

    public function prunable(): Builder
    {
        return static::query()->where('posts.created_at', '<=', now()->addMinutes(10));
    }

    protected $fillable = [
        'title',
    ];

    protected $attributes = [
        'title' => 'My title',
    ];


}
