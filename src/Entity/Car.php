<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    use SlugTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Brand = null;

    #[ORM\Column(length: 255)]
    private ?string $Model = null;

    #[ORM\Column(length: 255)]
    private ?string $Color = null;

    #[ORM\Column(length: 5)]
    private ?string $Year = null;

    #[ORM\Column(length: 6)]
    private ?string $Km = null;

    #[ORM\Column(length: 10)]
    private ?string $Price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'add_car')]
    private ?Administrator $administrator = null;

    #[ORM\ManyToOne(inversedBy: 'add_car')]
    private ?Employee $employee = null;

    #[ORM\OneToMany(mappedBy: 'car', targetEntity: CarImage::class)]
    private Collection $image;

    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): static
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): static
    {
        $this->Model = $Model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(string $Color): static
    {
        $this->Color = $Color;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->Year;
    }

    public function setYear(string $Year): static
    {
        $this->Year = $Year;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->Km;
    }

    public function setKm(string $Km): static
    {
        $this->Km = $Km;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAdministrator(): ?Administrator
    {
        return $this->administrator;
    }

    public function setAdministrator(?Administrator $administrator): static
    {
        $this->administrator = $administrator;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return Collection<int, CarImage>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(CarImage $image): static
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
            $image->setCar($this);
        }

        return $this;
    }

    public function removeImage(CarImage $image): static
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCar() === $this) {
                $image->setCar(null);
            }
        }

        return $this;
    }
}
