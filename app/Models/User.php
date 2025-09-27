<?php

namespace App\Models;

use App\Models\Profile;
use App\Enums\UserAccountStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $attributes = [
        'locked' => false,
    ];

    protected $hidden = [
        'password',
    ];


    protected function locked(): Attribute
    {
        return Attribute::make(
            get: static fn (int $value) => $value === 1 ? "locked" : "unlocked",
        );
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);

    }

}
