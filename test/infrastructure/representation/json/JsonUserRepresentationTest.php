<?php

namespace jbangy\infrastructure\representation\json;

use jbangy\domain\User;
use PHPUnit\Framework\TestCase;

class JsonUserRepresentationTest extends TestCase
{
    /** @var JsonUserRepresentation */
    private $representation;

    public function testConvertWithId()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())->method("getId")->willReturn(10);
        $result = $this->representation->convert($user, ["id"]);
        $this->assertThat($result, $this->equalTo(["id" => 10]));
    }

    public function testConvertWithFirstname()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())->method("getFirstname")->willReturn("Jean");
        $result = $this->representation->convert($user, ["firstname"]);
        $this->assertThat($result, $this->equalTo(["firstname" => "Jean"]));
    }

    public function testConvertWithSurname()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())->method("getSurname")->willReturn("RICHARD");
        $result = $this->representation->convert($user, ["surname"]);
        $this->assertThat($result, $this->equalTo(["surname" => "RICHARD"]));
    }

    public function testConvertWithUnknownField()
    {
        $user = $this->createMock(User::class);
        $result = $this->representation->convert($user, ["unknown"]);
        $this->assertThat($result, $this->equalTo([]));
    }

    public function testConvertWithDefaultFields()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())->method("getId")->willReturn(10);
        $user->expects($this->once())->method("getFirstname")->willReturn("Sébastien");
        $user->expects($this->once())->method("getSurname")->willReturn("COLIN");

        $result = $this->representation->convert($user);
        $this->assertThat($result, $this->equalTo([
            "id" => 10,
            "firstname" => "Sébastien",
            "surname" => "COLIN",
        ]));
    }

    public function testConvertAll()
    {
        $user1 = $this->createMock(User::class);
        $user1->expects($this->once())->method("getId")->willReturn(1);
        $user2 = $this->createMock(User::class);
        $user2->expects($this->once())->method("getId")->willReturn(2);

        $result = $this->representation->convertAll([$user1, $user2], ["id"]);
        $this->assertThat($result, $this->equalTo([
            ["id" => 1],
            ["id" => 2],
        ]));
    }

    public function testConvertAllWithEmptyValues()
    {
        $result = $this->representation->convertAll([], ["id"]);
        $this->assertThat($result, $this->equalTo([]));
    }

    public function testConvertAllWithDefaultFields()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())->method("getId")->willReturn(1);
        $user->expects($this->once())->method("getFirstname")->willReturn("Laura");
        $user->expects($this->once())->method("getSurname")->willReturn("PALIGUY");

        $result = $this->representation->convertAll([$user]);
        $this->assertThat($result, $this->equalTo([[
            "id" => 1,
            "firstname" => "Laura",
            "surname" => "PALIGUY",
        ]]));
    }

    protected function setUp()
    {
        parent::setUp();
        $this->representation = new JsonUserRepresentation();
    }
}
