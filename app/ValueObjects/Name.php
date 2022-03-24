<?php

namespace App\ValueObjects;

class Name
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        $shortLastName = mb_substr($this->lastName, 0, 1);

        return "{$this->firstName} {$shortLastName}.";
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getFullName();
    }

}
