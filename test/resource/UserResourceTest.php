<?php

namespace jbangy\resource;

use jbangy\domain\repository\UserRepository;
use jbangy\domain\User;
use jbangy\infrastructure\representation\json\JsonUserRepresentation;
use PHPUnit\Framework\MockObject\MockObject;

class UserResourceTest extends ResourceTestCase
{
    /** @var MockObject */
    private $userRepository;
    /** @var MockObject */
    private $userRepresentation;

    public function setUp()
    {
        parent::setUp();
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->repositories->expects($this->once())->method("ofUser")->willReturn($this->userRepository);
        $this->userRepresentation = $this->createMock(JsonUserRepresentation::class);
        $this->representations->expects($this->once())->method("ofUser")->willReturn($this->userRepresentation);
    }

    public function testGetList()
    {
        $user = $this->createMock(User::class);
        $this->userRepository->expects($this->once())->method("getAll")->willReturn([$user]);
        $this->userRepresentation->expects($this->once())->method("convertAll")
            ->with([$user], ["id"])
            ->willReturn([["id" => 5]]);

        $this->client->get('/users?fields=id');

        $this->assertThat($this->client->response->getStatusCode(), $this->equalTo(200));
        $this->assertThat($this->client->response->getBody(),
            $this->equalTo(json_encode([['id' => 5]])));
    }
}
