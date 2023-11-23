<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'add_service')]
    private ?User $administrator = null;

   #[ORM\OneToMany(mappedBy: 'service', targetEntity: ServiceImage::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
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
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }
    public function addImage(ServiceImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setService($this);
        }

        return $this;
    }

    public function removeImage(ServiceImage $image): self
    {
        if ($this->images->removeElement($image)) {
            if ($image->getService() === $this) {
                $image->setService(null);
            }
        }

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAdministrator(): ?User
    {
        return $this->administrator;
    }

    public function setAdministrator(?User $administrator): static
    {
        $this->administrator = $administrator;

        return $this;
    }
    }

    /**
     * @return Collection<int, ServiceImage>
     */
