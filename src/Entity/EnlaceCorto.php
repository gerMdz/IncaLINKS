<?php

namespace App\Entity;

use App\Repository\EnlaceCortoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnlaceCortoRepository::class)
 */
class EnlaceCorto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enlace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkRoute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnlace(): ?string
    {
        return $this->enlace;
    }

    public function setEnlace(string $enlace): self
    {
        $this->enlace = $enlace;

        return $this;
    }

    public function getLinkRoute(): ?string
    {
        return $this->linkRoute;
    }

    public function setLinkRoute(string $linkRoute): self
    {
        $this->linkRoute = $linkRoute;

        return $this;
    }
}
