<?php

namespace jbangy\domain\repository;

abstract class Repositories
{
    /** @var Repositories */
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
     * @return UserRepository
     */
    public abstract function ofUser();
}