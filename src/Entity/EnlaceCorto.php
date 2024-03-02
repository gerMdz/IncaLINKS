<?php

namespace App\Entity;

use App\Repository\EnlaceCortoRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: 'inca_enlace_corto')]
#[ORM\Entity(repositoryClass: EnlaceCortoRepository::class)]
class EnlaceCorto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[Gedmo\Slug(fields: ['enlace'])]
    #[ORM\Column(length: 150, unique: true, nullable: true)]
    #[Groups('enlace_get')]
    private ?string $enlace = null;

    #[ORM\Column()]
    #[Groups('enlace_get')]
    private ?string $linkRoute = null;

    #[ORM\ManyToOne(inversedBy: 'enlaces')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Organization $owner = null;

    #[ORM\Column()]
    private bool $isActive = true;

    public function __construct()
    {
    }

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

    public function getOwner(): ?Organization
    {
        return $this->owner;
    }

    public function setOwner(?Organization $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
