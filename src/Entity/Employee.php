<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $Lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Password = null;

    #[ORM\ManyToOne(inversedBy: 'add_employee')]
    private ?Administrator $administrator = null;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Messages::class)]
    private Collection $consult_message;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Car::class)]
    private Collection $add_car;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Car::class)]
    private Collection $delete_car;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Reviews::class)]
    private Collection $check_review;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Reviews::class)]
    private Collection $delete_review;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Reviews::class)]
    private Collection $add_review;

    public function __construct()
    {
        $this->consult_message = new ArrayCollection();
        $this->add_car = new ArrayCollection();
        $this->delete_car = new ArrayCollection();
        $this->check_review = new ArrayCollection();
        $this->delete_review = new ArrayCollection();
        $this->add_review = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): static
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): static
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

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

    /**
     * @return Collection<int, Messages>
     */
    public function getConsultMessage(): Collection
    {
        return $this->consult_message;
    }

    public function addConsultMessage(Messages $consultMessage): static
    {
        if (!$this->consult_message->contains($consultMessage)) {
            $this->consult_message->add($consultMessage);
            $consultMessage->setEmployee($this);
        }

        return $this;
    }

    public function removeConsultMessage(Messages $consultMessage): static
    {
        if ($this->consult_message->removeElement($consultMessage)) {
            // set the owning side to null (unless already changed)
            if ($consultMessage->getEmployee() === $this) {
                $consultMessage->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getAddCar(): Collection
    {
        return $this->add_car;
    }

    public function addAddCar(Car $addCar): static
    {
        if (!$this->add_car->contains($addCar)) {
            $this->add_car->add($addCar);
            $addCar->setEmployee($this);
        }

        return $this;
    }

    public function removeAddCar(Car $addCar): static
    {
        if ($this->add_car->removeElement($addCar)) {
            // set the owning side to null (unless already changed)
            if ($addCar->getEmployee() === $this) {
                $addCar->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getDeleteCar(): Collection
    {
        return $this->delete_car;
    }

    public function addDeleteCar(Car $deleteCar): static
    {
        if (!$this->delete_car->contains($deleteCar)) {
            $this->delete_car->add($deleteCar);
            $deleteCar->setEmployee($this);
        }

        return $this;
    }

    public function removeDeleteCar(Car $deleteCar): static
    {
        if ($this->delete_car->removeElement($deleteCar)) {
            // set the owning side to null (unless already changed)
            if ($deleteCar->getEmployee() === $this) {
                $deleteCar->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getCheckReview(): Collection
    {
        return $this->check_review;
    }

    public function addCheckReview(Reviews $checkReview): static
    {
        if (!$this->check_review->contains($checkReview)) {
            $this->check_review->add($checkReview);
            $checkReview->setEmployee($this);
        }

        return $this;
    }

    public function removeCheckReview(Reviews $checkReview): static
    {
        if ($this->check_review->removeElement($checkReview)) {
            // set the owning side to null (unless already changed)
            if ($checkReview->getEmployee() === $this) {
                $checkReview->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getDeleteReview(): Collection
    {
        return $this->delete_review;
    }

    public function addDeleteReview(Reviews $deleteReview): static
    {
        if (!$this->delete_review->contains($deleteReview)) {
            $this->delete_review->add($deleteReview);
            $deleteReview->setEmployee($this);
        }

        return $this;
    }

    public function removeDeleteReview(Reviews $deleteReview): static
    {
        if ($this->delete_review->removeElement($deleteReview)) {
            // set the owning side to null (unless already changed)
            if ($deleteReview->getEmployee() === $this) {
                $deleteReview->setEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getAddReview(): Collection
    {
        return $this->add_review;
    }

    public function addAddReview(Reviews $addReview): static
    {
        if (!$this->add_review->contains($addReview)) {
            $this->add_review->add($addReview);
            $addReview->setEmployee($this);
        }

        return $this;
    }

    public function removeAddReview(Reviews $addReview): static
    {
        if ($this->add_review->removeElement($addReview)) {
            // set the owning side to null (unless already changed)
            if ($addReview->getEmployee() === $this) {
                $addReview->setEmployee(null);
            }
        }

        return $this;
    }
}
