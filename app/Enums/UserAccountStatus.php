<?php

namespace App\Enums;

enum UserAccountStatus: int
{
    case LOCKED=  1;
    case UNLOCKED= 0;
}
