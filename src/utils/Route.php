<?php

namespace jbangy\utils;

class Route
{
    private static $app;

    public static function setApp($app)
    {
        static::$app = $app;
    }

    public static function of($class): Verb
    {
        return new Verb(static::$app, $class);
    }
}