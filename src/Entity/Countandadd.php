<?php

namespace App\Entity;

use App\Repository\CountandaddRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountandaddRepository::class)]
class Countandadd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $totalPeople;

    #[ORM\Column(type: 'integer')]
    private $totalPromises;

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
