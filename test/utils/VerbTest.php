<?php

namespace jbangy\utils;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

class VerbTest extends TestCase
{
    /** @var MockObject */
    private $app;

    public function testHttpConstant()
    {
        $this->assertThat(Verb::GET, $this->equalTo("get"));
        $this->assertThat(Verb::POST, $this->equalTo("post"));
        $this->assertThat(Verb::PUT, $this->equalTo("put"));
        $this->assertThat(Verb::DELETE, $this->equalTo("delete"));
    }

    public function testAddAGetRoute()
    {
        $this->app->expects($this->once())->method('get')->with('/dummy');
        $verb = new Verb($this->app, DummyResource::class);
        $verb->add('/dummy', Verb::GET, 'method');
    }

    public function testAddAPostRoute()
    {
        $this->app->expects($this->once())->method('post')->with('/dummy');
        $verb = new Verb($this->app, DummyResource::class);
        $verb->add('/dummy', Verb::POST, 'method');
    }

    public function testAddAPutRoute()
    {
        $this->app->expects($this->once())->method('put')->with('/dummy');
        $verb = new Verb($this->app, DummyResource::class);
        $verb->add('/dummy', Verb::PUT, 'method');
    }

    public function testAddADeleteRoute()
    {
        $this->app->expects($this->once())->method('delete')->with('/dummy');
        $verb = new Verb($this->app, DummyResource::class);
        $verb->add('/dummy', Verb::DELETE, 'method');
    }

    protected function setUp()
    {
        parent::setUp();
        $this->app = $this->createMock(App::class);
    }
}

class DummyResource
{
    public function get(Request $request, Response $response, array $args)
    {
    }

    public function delete(Request $request, Response $response, array $args)
    {
    }

    public function post(Request $request, Response $response, array $args)
    {
    }

    public function put(Request $request, Response $response, array $args)
    {
    }
}