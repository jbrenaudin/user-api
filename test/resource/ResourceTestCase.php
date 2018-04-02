<?php

namespace jbangy\resource;

use jbangy\domain\repository\Repositories;
use jbangy\infrastructure\representation\Representations;
use jbangy\Routes;
use PHPUnit\Framework\MockObject\MockObject;
use There4\Slim\Test\WebTestCase;

class ResourceTestCase extends WebTestCase
{
    /** @var MockObject */
    protected $repositories;
    /** @var MockObject */
    protected $representations;

    public function setup()
    {
        parent::setup();
        Routes::initialize($this->app);

        $this->repositories = $this->createMock(Repositories::class);
        Repositories::initialize($this->repositories);

        $this->representations = $this->createMock(Representations::class);
        Representations::initialize($this->representations);
    }
}