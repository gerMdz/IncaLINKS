<?php

namespace App\Entity;

use App\Repository\CountandaddRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountandaddRepository::class)]
class Countandadd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column()]
    private ?int $totalPeople = null;

    #[ORM\Column()]
    private ?int $totalPromises = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPeople(): ?int
    {
        return $this->totalPeople;
    }

    public function setTotalPeople(int $totalPeople): self
    {
        $this->totalPeople = $totalPeople;

        return $this;
    }

    public function getTotalPromises(): ?int
    {
        return $this->totalPromises;
    }

    public function setTotalPromises(int $totalPromises): self
    {
        $this->totalPromises = $totalPromises;

        return $this;
    }
}
