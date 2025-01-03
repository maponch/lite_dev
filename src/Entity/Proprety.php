<?php

namespace App\Entity;

use App\Repository\PropretyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropretyRepository::class)]
class Proprety
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::ARRAY)]
    private array $tenant = [];

    #[ORM\Column]
    private ?int $id_type = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'propreties')]
    private Collection $username;

    #[ORM\ManyToOne(inversedBy: 'id_type')]
    private ?Type $type = null;


    public function __construct()
    {
        $this->username = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTenant(): array
    {
        return $this->tenant;
    }

    public function setTenant(array $tenant): static
    {
        $this->tenant = $tenant;

        return $this;
    }

    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    public function setIdType(int $id_type): static
    {
        $this->id_type = $id_type;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsername(): Collection
    {
        return $this->username;
    }

    public function addUsername(User $username): static
    {
        if (!$this->username->contains($username)) {
            $this->username->add($username);
        }

        return $this;
    }

    public function removeUsername(User $username): static
    {
        $this->username->removeElement($username);

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): static
    {
        $this->building = $building;

        return $this;
    }
}
