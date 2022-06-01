<?php

namespace mvcobjet\models\entities;

class Director
{
    private $id;
    private $firstName;
    private $lastName;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $f)
    {
        $this->firstName =  $f;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $l)
    {
        $this->lastName =  $l;
    }
}
