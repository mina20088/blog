<?php

namespace App\Models;


use Database\Factories\ProfileFactory as ProfileFactoryAlias;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    /** @use HasFactory<Profile> */
    use HasFactory;

    protected $guarded = [
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
      'phone_number' => '000000000'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'gender' => 'integer'
        ];
    }
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: static fn (int $value) => $value === 0 ? "male" : "female",
        );
    }


}
