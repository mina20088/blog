<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    use SoftDeletes , HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
    ];

    protected $attributes = [
        'locked' => false
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'locked' => 'boolean',
    ];
}
