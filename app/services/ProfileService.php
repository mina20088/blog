<?php

namespace App\services;

use App\Models\Profile;
use App\Models\User;

class ProfileService
{

    public static function create(array $profile, ?User $user = null)
    {
        return is_null($user) ?
            Profile::create($profile) :
            $user->profile()->create($profile);
    }
}
