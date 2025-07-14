<?php

namespace App\Helpers;

class FormHelpers
{
    public static function singleSelect(string $filedName, string $value, string $default = null): bool
    {
        return old($filedName,$default) === $value;
    }
    public static function multiSelect(string $fieldName, string $value, array $default = []): bool
    {
        return in_array($fieldName, old($value, []));
    }
    public static function multiChecked(string $fieldName, string $value, array $default = []): bool
    {
         return self::multiSelect($fieldName, $value, $default);
    }
}
