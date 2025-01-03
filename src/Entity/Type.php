<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, proprety>
     */
    #[ORM\OneToMany(targetEntity: proprety::class, mappedBy: 'type')]
    private Collection $id_type;

    public function __construct()
    {
        $this->id_type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, proprety>
     */
    public function getIdType(): Collection
    {
        return $this->id_type;
    }

    public function addIdType(proprety $idType): static
    {
        if (!$this->id_type->contains($idType)) {
            $this->id_type->add($idType);
            $idType->setType($this);
        }

        return $this;
    }

    public function removeIdType(proprety $idType): static
    {
        if ($this->id_type->removeElement($idType)) {
            // set the owning side to null (unless already changed)
            if ($idType->getType() === $this) {
                $idType->setType(null);
            }
        }

        return $this;
    }
}
