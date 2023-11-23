<?php

namespace App\Entity;

use App\Entity\CarImage;
use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $year = null;

    #[ORM\Column(length: 6)]
    private ?string $km = null;

    #[ORM\Column(length: 10)]
    private ?string $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'addCar')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'car', targetEntity: CarImage::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $images;

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function setImages(Collection $images): self
    {
        $this->images = $images;

        return $this;
    }
    public function addImage($imageName): self
    {
    $existingImage = $this->getImages()->filter(function (CarImage $image) use ($imageName) {
        return $image->getTitle() === $imageName;
    })->first();

    if ($existingImage instanceof CarImage) {
        $this->images[] = $existingImage;
    } else {
        $carImage = new CarImage();
        $carImage->setTitle($imageName);
        $carImage->setCar($this);
        $carImage->setDescription('Description de l\'image'); // Vous pouvez également définir la description

        $this->images[] = $carImage;
    }

    return $this;
}


    public function removeImage(CarImage $image): self
    {
        if ($this->images->removeElement($image)) {
            if ($image->getCar() === $this) {
                $image->setCar(null);
            }
        }

        return $this;
    }
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->km;
    }

    public function setKm(string $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}