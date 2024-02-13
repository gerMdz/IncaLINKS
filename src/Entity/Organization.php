<?php

namespace App\Entity;

use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Table(name: 'inca_organization')]
#[ORM\Entity(repositoryClass: OrganizationRepository::class)]
class Organization
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?string $id = null;

    #[ORM\Column(type: 'text', length: 510)]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 1020)]
    private $address;

    #[ORM\Column(type: 'string', length: 10, unique: true, nullable: true)]
    private $identifier;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $responsable;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\OneToMany(targetEntity: EnlaceCorto::class, mappedBy: 'owner')]
    private $enlaces;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'organization')]
    private $users;

    #[ORM\Column(type: 'boolean')]
    private $isActive = true;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->createdAt = new \DateTime();
        $this->markAsUpdated();
        $this->enlaces = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?Uuid
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return EnlaceCorto|ArrayCollection|Collection|array|null
     */
    public function getEnlaces(): EnlaceCorto|ArrayCollection|Collection|array|null
    {
        return $this->enlaces;
    }

    public function addEnlace(EnlaceCorto $enlace): self
    {
        if (!$this->enlaces->contains($enlace)) {
            $this->enlaces[] = $enlace;
            $enlace->setOwner($this);
        }

        return $this;
    }

    public function removeEnlace(EnlaceCorto $enlace): self
    {
        if ($this->enlaces->removeElement($enlace)) {
            // set the owning side to null (unless already changed)
            if ($enlace->getOwner() === $this) {
                $enlace->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Collection|array|User|null
     */
    public function getUsers(): ArrayCollection|Collection|array|User|null
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setOrganization($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getOrganization() === $this) {
                $user->setOrganization(null);
            }
        }

        return $this;
    }

    private function markAsUpdated()
    {
        $this->updatedAt = new \DateTime();
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
