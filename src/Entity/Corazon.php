<?php

namespace App\Entity;

use App\Repository\CorazonRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CorazonRepository::class)]
class Corazon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column()]
    private ?string $name = null;

    #[ORM\Column(length: 150, unique: true)]
    private ?string $email = null;

    #[ORM\Column()]
    private ?float $promise = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column()]
    private ?\DateTime $created = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column()]
    private ?\DateTime $updated = null;

    #[Gedmo\Timestampable(on: 'change', field: ['promise'])]
    #[ORM\Column(name: 'content_changed', nullable: true)]
    private ?\DateTime $contentChanged = null;

    #[ORM\Column()]
    private ?int $meses = 1;

    #[ORM\Column(nullable: true)]
    private ?string $apellido = null;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPromise(): ?float
    {
        return $this->promise;
    }

    public function setPromise(float $promise): self
    {
        $this->promise = $promise;

        return $this;
    }

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }

    public function getContentChanged(): ?\DateTime
    {
        return $this->contentChanged;
    }

    public function getMeses(): ?int
    {
        return $this->meses;
    }

    public function setMeses(int $meses): self
    {
        $this->meses = $meses;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }
}
