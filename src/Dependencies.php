<?php

namespace jbangy;

use jbangy\domain\repository\Repositories;
use jbangy\infrastructure\repository\doctrine\DoctrineRepositories;
use jbangy\infrastructure\representation\json\JsonRepresentations;
use jbangy\infrastructure\representation\Representations;

class Dependencies
{
    public static function intialize()
    {
        Repositories::initialize(new DoctrineRepositories());
        Representations::initialize(new JsonRepresentations());
    }
}