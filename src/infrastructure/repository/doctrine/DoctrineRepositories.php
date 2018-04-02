<?php

namespace jbangy\infrastructure\repository\doctrine;

use jbangy\domain\repository\Repositories;

class DoctrineRepositories extends Repositories
{
    public function ofUser()
    {
        return new DoctrineUserRepository();
    }
}