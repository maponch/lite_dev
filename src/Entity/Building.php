<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $municipalities = null;

    #[ORM\Column]
    private ?int $postal_code = null;

    #[ORM\Column]
    private ?int $floor = null;

    #[ORM\Column]
    private ?int $number_of_lot = null;

    #[ORM\Column]
    private ?string $administrator = null;

    #[ORM\Column(nullable: true)]
    private ?string $supplier = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'buildings')]
    private Collection $administator;

    /**
     * @var Collection<int, proprety>
     */
    #[ORM\OneToMany(targetEntity: proprety::class, mappedBy: 'building')]
    private Collection $id_building;

    /**
     * @var Collection<int, supplier>
     */
    #[ORM\ManyToMany(targetEntity: supplier::class, inversedBy: 'buildings')]
    private Collection $supplier_id;

    public function __construct()
    {
        $this->administator = new ArrayCollection();
        $this->id_building = new ArrayCollection();
        $this->supplier_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function getMunicipalities(): ?string
    {
        return $this->municipalities;
    }

    public function setMunicipalities(string $municipalities): static
    {
        $this->municipalities = $municipalities;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): static
    {
        $this->floor = $floor;

        return $this;
    }

    public function getNumberOfLot(): ?int
    {
        return $this->number_of_lot;
    }

    public function setNumberOfLot(int $number_of_lot): static
    {
        $this->number_of_lot = $number_of_lot;

        return $this;
    }

    public function getAdministrator(): ?string
    {
        return $this->administrator;
    }

    public function setAdministrator(string $administrator): static
    {
        $this->administrator = $administrator;

        return $this;
    }

    public function getSupplier(): ?string
    {
        return $this->supplier;
    }

    public function setSupplier(?string $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAdministator(): Collection
    {
        return $this->administator;
    }

    public function addAdministator(User $administator): static
    {
        if (!$this->administator->contains($administator)) {
            $this->administator->add($administator);
        }

        return $this;
    }

    public function removeAdministator(User $administator): static
    {
        $this->administator->removeElement($administator);

        return $this;
    }

    /**
     * @return Collection<int, proprety>
     */
    public function getIdBuilding(): Collection
    {
        return $this->id_building;
    }

    public function addIdBuilding(proprety $idBuilding): static
    {
        if (!$this->id_building->contains($idBuilding)) {
            $this->id_building->add($idBuilding);
            $idBuilding->setBuilding($this);
        }

        return $this;
    }

    public function removeIdBuilding(proprety $idBuilding): static
    {
        if ($this->id_building->removeElement($idBuilding)) {
            // set the owning side to null (unless already changed)
            if ($idBuilding->getBuilding() === $this) {
                $idBuilding->setBuilding(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, supplier>
     */
    public function getSupplierId(): Collection
    {
        return $this->supplier_id;
    }

    public function addSupplierId(supplier $supplierId): static
    {
        if (!$this->supplier_id->contains($supplierId)) {
            $this->supplier_id->add($supplierId);
        }

        return $this;
    }

    public function removeSupplierId(supplier $supplierId): static
    {
        $this->supplier_id->removeElement($supplierId);

        return $this;
    }
}
