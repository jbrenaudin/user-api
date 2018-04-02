<?php

namespace jbangy\utils;

use PHPUnit\Framework\TestCase;
use Slim\App;

class RouteTest extends TestCase
{
    private $app;

    public function testOfReturnsVerb()
    {
        $result = Route::of(Dummy::class);
        $this->assertThat($result, $this->equalTo(new Verb($this->app, Dummy::class)));
    }

    protected function setUp()
    {
        parent::setUp();
        $this->app = $this->createMock(App::class);
        Route::setApp($this->app);
    }
}