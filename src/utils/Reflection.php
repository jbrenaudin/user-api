<?php

namespace jbangy\utils;

class Reflection
{
    public static function newInstanceOf(string $class)
    {
        $reflectionClass = new \ReflectionClass($class);
        return $reflectionClass->newInstanceWithoutConstructor();
    }

    public static function setProperty($property, $value, $object)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $reflexionProperty = $reflectionClass->getProperty($property);
        $reflexionProperty->setAccessible(true);
        $reflexionProperty->setValue($object, $value);
        return $object;
    }

    public static function getProperty($property, $object)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $reflexionProperty = $reflectionClass->getProperty($property);
        $reflexionProperty->setAccessible(true);
        return $reflexionProperty->getValue($object);
    }
}