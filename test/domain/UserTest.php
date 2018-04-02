<?php

namespace jbangy\domain;

use jbangy\utils\Reflection;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreate()
    {
        $result = new User("Danny", "BROWN");
        $this->assertThat($result->getId(), $this->isNull());
        $this->assertThat($result->getFirstname(), $this->equalTo("Danny"));
        $this->assertThat($result->getSurname(), $this->equalTo("BROWN"));
    }

    public function testGetId()
    {
        $user = Reflection::setProperty("id", 1, new User("", ""));
        $this->assertThat(1, $this->equalTo($user->getId()));
    }

    public function testGetFirstname()
    {
        $user = Reflection::setProperty("firstname", "John", new User("", ""));
        $this->assertThat("John", $this->equalTo($user->getFirstname()));
    }

    public function testGetSurname()
    {
        $user = Reflection::setProperty("surname", "DOE", new User("", ""));
        $this->assertThat("DOE", $this->equalTo($user->getSurname()));
    }
}
