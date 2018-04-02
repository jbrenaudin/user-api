<?php

namespace jbangy\resource;

use jbangy\domain\repository\Repositories;
use jbangy\infrastructure\representation\Representations;
use jbangy\utils\Parameter;
use Slim\Http\Request;
use Slim\Http\Response;

class UserResource
{
    public function getList(Request $request, Response $response, array $args)
    {
        $users = Repositories::instance()->ofUser()->getAll();
        return $response->withJson(
            Representations::instance()->ofUser()->convertAll($users,
                Parameter::extractFields($request->getParam('fields'))),
            200);
    }
}