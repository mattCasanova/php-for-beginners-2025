<?php

class Validator
{
    public static function string(?string $value, int $max = INF, int $min = 1): bool
    {
        $length = strlen(trim($value));
        return $length >= $min && $length <= $max;
    }

    public static function email(?string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
