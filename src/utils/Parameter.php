<?php

namespace jbangy\utils;

class Parameter
{
    public static function extractFields($values)
    {
        return array_map(function ($value) {
            return trim($value);
        }, empty($values) ? [] : explode(',', $values));
    }
}