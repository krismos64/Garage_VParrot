<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sdfg = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSdfg(): ?string
    {
        return $this->sdfg;
    }

    public function setSdfg(string $sdfg): static
    {
        $this->sdfg = $sdfg;

        return $this;
    }
}
