<?php

namespace App\Helpers;

class Str extends \Illuminate\Support\Str
{
    /**
     * Check if a value is valid JSON. NOTE: Numeric values are also considered valid JSON.
     *
     * @param mixed $value
     * @param bool $arrayOnly to only return true if the JSON is a valid array.
     *
     * @return bool
     */
    public static function isValidJson(mixed $value, bool $arrayOnly = true): bool
    {
        if (is_string($value) || is_numeric($value)) {
            $json = json_decode($value, true);

            // There could be JSON strings or numeric values, we don't want them to be valid if $arrayOnly is true.
            return ! is_null($json) && ($arrayOnly === false || ($arrayOnly === true && is_array($json)));
        }
        return false;
    }
}
