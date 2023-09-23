<?php

namespace Core;

class Validator 
{
    // As a pure function, string() can be made static with no risks
    public static function string($value, $min = 1, $max = INF) 
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool 
    {
        return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $greaterThan): bool 
    {
        return $value > $greaterThan;
    }
}