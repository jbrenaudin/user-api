<?php

namespace jbangy;

use jbangy\resource\UserResource;
use jbangy\utils\Route;
use jbangy\utils\Verb;

class Routes
{
    public static function initialize($app)
    {
        Route::setApp($app);

        Route::of(UserResource::class)
            ->add('/users', Verb::GET, 'getList');
    }
}