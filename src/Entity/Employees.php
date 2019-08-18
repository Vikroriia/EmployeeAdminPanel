<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Patronymic;

    /**
     * @ORM\Column(type="integer")
     */
    private $Position_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getPatronymic(): ?string
    {
        return $this->Patronymic;
    }

    public function setPatronymic(string $Patronymic): self
    {
        $this->Patronymic = $Patronymic;

        return $this;
    }

    public function getPosition_id(): ?int
    {
        return $this->Position_id;
    }

    public function setPosition_id(int $Position_id): self
    {
        $this->Position_id = $Position_id;

        return $this;
    }
}
