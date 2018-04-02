<?php

namespace jbangy\infrastructure\repository\doctrine;

use jbangy\domain\repository\UserRepository;
use jbangy\domain\User;

class DoctrineUserRepository implements UserRepository
{
    public function getAll(): array
    {
        return [
            new User('MAJOR', 'John'),
            new User('BLAIR', 'Tony'),
            new User('BROWN', 'Gordon'),
            new User('CAMERON', 'David'),
        ];
    }
}