<?php

namespace App\Entity;

use App\Repository\AdministratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministratorRepository::class)]
class Administrator
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

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Employee::class)]
    private Collection $add_employee;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Employee::class)]
    private Collection $delete_employee;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Schedules::class)]
    private Collection $modify_schedules;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Service::class)]
    private Collection $add_service;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Service::class)]
    private Collection $delete_service;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Messages::class)]
    private Collection $consult_message;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Car::class)]
    private Collection $add_car;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Car::class)]
    private Collection $delete_car;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Reviews::class)]
    private Collection $check_review;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Reviews::class)]
    private Collection $delete_review;

    #[ORM\OneToMany(mappedBy: 'administrator', targetEntity: Reviews::class)]
    private Collection $add_review;

    public function __construct()
    {
        $this->add_employee = new ArrayCollection();
        $this->delete_employee = new ArrayCollection();
        $this->modify_schedules = new ArrayCollection();
        $this->add_service = new ArrayCollection();
        $this->delete_service = new ArrayCollection();
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

    /**
     * @return Collection<int, Employee>
     */
    public function getAddEmployee(): Collection
    {
        return $this->add_employee;
    }

    public function addAddEmployee(Employee $addEmployee): static
    {
        if (!$this->add_employee->contains($addEmployee)) {
            $this->add_employee->add($addEmployee);
            $addEmployee->setAdministrator($this);
        }

        return $this;
    }

    public function removeAddEmployee(Employee $addEmployee): static
    {
        if ($this->add_employee->removeElement($addEmployee)) {
            // set the owning side to null (unless already changed)
            if ($addEmployee->getAdministrator() === $this) {
                $addEmployee->setAdministrator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getDeleteEmployee(): Collection
    {
        return $this->delete_employee;
    }

    public function addDeleteEmployee(Employee $deleteEmployee): static
    {
        if (!$this->delete_employee->contains($deleteEmployee)) {
            $this->delete_employee->add($deleteEmployee);
            $deleteEmployee->setAdministrator($this);
        }

        return $this;
    }

    public function removeDeleteEmployee(Employee $deleteEmployee): static
    {
        if ($this->delete_employee->removeElement($deleteEmployee)) {
            // set the owning side to null (unless already changed)
            if ($deleteEmployee->getAdministrator() === $this) {
                $deleteEmployee->setAdministrator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Schedules>
     */
    public function getModifySchedules(): Collection
    {
        return $this->modify_schedules;
    }

    public function addModifySchedule(Schedules $modifySchedule): static
    {
        if (!$this->modify_schedules->contains($modifySchedule)) {
            $this->modify_schedules->add($modifySchedule);
            $modifySchedule->setAdministrator($this);
        }

        return $this;
    }

    public function removeModifySchedule(Schedules $modifySchedule): static
    {
        if ($this->modify_schedules->removeElement($modifySchedule)) {
            // set the owning side to null (unless already changed)
            if ($modifySchedule->getAdministrator() === $this) {
                $modifySchedule->setAdministrator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getAddService(): Collection
    {
        return $this->add_service;
    }

    public function addAddService(Service $addService): static
    {
        if (!$this->add_service->contains($addService)) {
            $this->add_service->add($addService);
            $addService->setAdministrator($this);
        }

        return $this;
    }

    public function removeAddService(Service $addService): static
    {
        if ($this->add_service->removeElement($addService)) {
            // set the owning side to null (unless already changed)
            if ($addService->getAdministrator() === $this) {
                $addService->setAdministrator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getDeleteService(): Collection
    {
        return $this->delete_service;
    }

    public function addDeleteService(Service $deleteService): static
    {
        if (!$this->delete_service->contains($deleteService)) {
            $this->delete_service->add($deleteService);
            $deleteService->setAdministrator($this);
        }

        return $this;
    }

    public function removeDeleteService(Service $deleteService): static
    {
        if ($this->delete_service->removeElement($deleteService)) {
            // set the owning side to null (unless already changed)
            if ($deleteService->getAdministrator() === $this) {
                $deleteService->setAdministrator(null);
            }
        }

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
            $consultMessage->setAdministrator($this);
        }

        return $this;
    }

    public function removeConsultMessage(Messages $consultMessage): static
    {
        if ($this->consult_message->removeElement($consultMessage)) {
            // set the owning side to null (unless already changed)
            if ($consultMessage->getAdministrator() === $this) {
                $consultMessage->setAdministrator(null);
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
            $addCar->setAdministrator($this);
        }

        return $this;
    }

    public function removeAddCar(Car $addCar): static
    {
        if ($this->add_car->removeElement($addCar)) {
            // set the owning side to null (unless already changed)
            if ($addCar->getAdministrator() === $this) {
                $addCar->setAdministrator(null);
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
            $deleteCar->setAdministrator($this);
        }

        return $this;
    }

    public function removeDeleteCar(Car $deleteCar): static
    {
        if ($this->delete_car->removeElement($deleteCar)) {
            // set the owning side to null (unless already changed)
            if ($deleteCar->getAdministrator() === $this) {
                $deleteCar->setAdministrator(null);
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
            $checkReview->setAdministrator($this);
        }

        return $this;
    }

    public function removeCheckReview(Reviews $checkReview): static
    {
        if ($this->check_review->removeElement($checkReview)) {
            // set the owning side to null (unless already changed)
            if ($checkReview->getAdministrator() === $this) {
                $checkReview->setAdministrator(null);
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
            $deleteReview->setAdministrator($this);
        }

        return $this;
    }

    public function removeDeleteReview(Reviews $deleteReview): static
    {
        if ($this->delete_review->removeElement($deleteReview)) {
            // set the owning side to null (unless already changed)
            if ($deleteReview->getAdministrator() === $this) {
                $deleteReview->setAdministrator(null);
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
            $addReview->setAdministrator($this);
        }

        return $this;
    }

    public function removeAddReview(Reviews $addReview): static
    {
        if ($this->add_review->removeElement($addReview)) {
            // set the owning side to null (unless already changed)
            if ($addReview->getAdministrator() === $this) {
                $addReview->setAdministrator(null);
            }
        }

        return $this;
    }
}
