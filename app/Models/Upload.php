<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Upload extends Model
{

    protected $fillable = [
        'name',
        'path',
        'mime_type',
        'size'
    ];

    public function uploadable():MorphTo
    {
        return $this->morphTo();
    }
}
