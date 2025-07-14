<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{


    protected $attributes = [
        'locked' => 0,
        'role' => 1
    ];

}
