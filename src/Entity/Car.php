<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


 #[ORM\Entity(repositoryClass:CarRepository::class)]
 
class Car
{
     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column]
    
    private ?int $id = null;

    
     #[ORM\Column(length:255, nullable:true)]
     
    private ?string $name = null;

    
     #[ORM\Column(length:255, nullable:true)]
     
    private ?string $brand = null;

    
     #[ORM\Column(length:255, nullable:true)]
     
    private ?string $model = null;

    
     #[ORM\Column(length:255, nullable:true)]
    
    private ?string $year = null;

    
     #[ORM\Column(length:6, nullable:true)]
    
    private ?string $km = null;


     #[ORM\Column(length:10, nullable:true)]
  
    private ?string $price = null;

  
     #[ORM\Column(type:"text", nullable:true)]

    private ?string $description = null;


     #[ORM\ManyToOne(inversedBy:'addCar')]

    private ?User $user = null;

    
     #[ORM\Column(type:"json", nullable:true)]
    
    private ?array $images = null;

    
  
    private ?array $imageFiles = null;


     #[ORM\Column(type:"string", length:255, nullable:true)]
    
    private $imagePath;

    public function __construct()
    {
        $this->images = [];
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function addImage(string $imageName): self
    {
        $this->imageFiles[] = $imageName;

        return $this;
    }

    public function removeImage(string $imageName): self
    {
        $this->imageFiles = array_diff($this->imageFiles, [$imageName]);

        return $this;
    }

    /**
     * @return array|null
     */
    public function getImageFiles(): ?array
    {
        return $this->imageFiles;
    }

    /**
     * @param array|null $imageFiles
     */
    public function setImageFiles(?array $imageFiles): void
    {
        $this->imageFiles = $imageFiles;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): self
    {
        $this->imagePath = $imagePath;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->km;
    }

    public function setKm(?string $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
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
