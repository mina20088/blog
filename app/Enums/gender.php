<?php

namespace App\Enums;

enum Gender: int
{
    case male = 0;
    case female = 1;

    public static function values(): array
    {
        $values = [];
       foreach (self::cases() as $items) {
            $values[] = $items->value;
       }

       return $values;
    }

}
