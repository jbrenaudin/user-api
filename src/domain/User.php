<?php

namespace jbangy\domain;

class User
{
    private $id;
    private $firstname;
    private $surname;

    function __construct(string $firstname, string $surname)
    {
        $this
            ->setFirstname($firstname)
            ->setSurname($surname);
    }

    private function setSurname(string $surname): User
    {
        $this->surname = $surname;
        return $this;
    }

    private function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getId()
    {
        return $this->id;
    }
}