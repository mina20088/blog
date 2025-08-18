<?php

namespace App\Models;

use App\Enums\gender;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;
    protected $guarded = [
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    protected function casts (): array
    {
        return [
          'gender' => gender::class
        ];
    }


}
