<?php

namespace jbangy\infrastructure\representation;

abstract class Representations
{
    /** @var Representations */
    private static $instance;

    public static function initialize($instance)
    {
        static::$instance = $instance;
    }

    public static function instance()
    {
        return static::$instance;
    }

    /**
     * @return Representation
     */
    public abstract function ofUser();
}