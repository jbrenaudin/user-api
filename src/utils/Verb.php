<?php

namespace jbangy\utils;

use Slim\Http\Request;
use Slim\Http\Response;

class Verb
{
    const GET = 'get';
    const POST = 'post';
    const PUT = 'put';
    const DELETE = 'delete';
    private $app;
    private $class;

    function __construct($app, $class)
    {
        $this->app = $app;
        $this->class = $class;
    }

    public function add($url, $verb, $method): Verb
    {
        $class = $this->class;
        $this->app->{$verb}($url, function (Request $request, Response $response, array $args) use ($class, $method) {
            $resource = Reflection::newInstanceOf($class);
            return $resource->{$method}($request, $response, $args);
        });
        return $this;
    }
}