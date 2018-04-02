<?php

namespace jbangy\utils;

use PHPUnit\Framework\TestCase;

class ReflectionTest extends TestCase
{
    public function testNewInstance()
    {
        $result = Reflection::newInstanceOf(Dummy::class);
        $this->assertThat($result, $this->equalTo(new Dummy()));
    }

    public function testGetAndSetProperty()
    {
        $instance = Reflection::setProperty("property", "succeed", new Dummy());
        $result = Reflection::getProperty("property", $instance);
        $this->assertThat($result, $this->equalTo("succeed"));
    }
}