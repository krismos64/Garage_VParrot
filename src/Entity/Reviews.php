<?php

namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
class Reviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
   

    private ?int $id = null;

    #[ORM\Column(length: 100)]

    private ?string $firstname = null;

    #[ORM\Column(length: 100)]

    private ?string $lastname = null;

    #[ORM\Column(length: 255)]

 
    private ?string $email = null;

    #[ORM\Column]
 
    private ?int $rating = null;

    #[ORM\Column(type: Types::TEXT)]
  
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $publishedAt = null;

    #[ORM\Column]
    private ?bool $isApproved = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeInterface $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function isIsApproved(): ?bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): static
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    public function submitReview(Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();

    // Récupérer les données du formulaire
    $formData = $request->request->get('review_form');

    // Créer une nouvelle instance de l'entité Reviews
    $review = new Reviews();
    $review->setFirstname($formData['firstname']);
    $review->setLastname($formData['lastname']);
    $review->setEmail($formData['email']);
    $review->setMessage($formData['message']);
    $review->setRating($formData['note']);
   
    // ... Autres propriétés ...

    // Définir isApproved sur false par défaut
    $review->setIsApproved(false);

    // Enregistrer la nouvelle instance dans la base de données
    $entityManager->persist($review);
    $entityManager->flush();


}
}
