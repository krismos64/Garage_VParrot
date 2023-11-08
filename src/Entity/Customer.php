<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
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
    private ?string $Phone = null;

    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: Messages::class)]
    private Collection $leave_message;

    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: Reviews::class)]
    private Collection $add_review;

    public function __construct()
    {
        $this->leave_message = new ArrayCollection();
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

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    /**
     * @return Collection<int, Messages>
     */
    public function getLeaveMessage(): Collection
    {
        return $this->leave_message;
    }

    public function addLeaveMessage(Messages $leaveMessage): static
    {
        if (!$this->leave_message->contains($leaveMessage)) {
            $this->leave_message->add($leaveMessage);
            $leaveMessage->setCustomer($this);
        }

        return $this;
    }

    public function removeLeaveMessage(Messages $leaveMessage): static
    {
        if ($this->leave_message->removeElement($leaveMessage)) {
            // set the owning side to null (unless already changed)
            if ($leaveMessage->getCustomer() === $this) {
                $leaveMessage->setCustomer(null);
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
            $addReview->setCustomer($this);
        }

        return $this;
    }

    public function removeAddReview(Reviews $addReview): static
    {
        if ($this->add_review->removeElement($addReview)) {
            // set the owning side to null (unless already changed)
            if ($addReview->getCustomer() === $this) {
                $addReview->setCustomer(null);
            }
        }

        return $this;
    }
}
