<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'mime_type',
        'type',
        'size'
    ];

    public function uploadable():MorphTo
    {
        return $this->morphTo();
    }
}
