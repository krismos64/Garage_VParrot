<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/voitures', name: 'app_car')]
    public function index(CarRepository $carRepository, EntityManagerInterface $entityManager): Response
    {
        // Utilize the repository to get all cars
        $cars = $carRepository->findAll();

        // Load images explicitly for each car
foreach ($cars as $car) {
    $carId = $car->getId();
    $carImages = $entityManager->getRepository('App\Entity\CarImage')->findImagesByCar($carId);

    // Clear the existing images collection
    $car->getImages()->clear();

    // Add new images to the existing collection
    foreach ($carImages as $carImage) {
        $car->addImage($carImage);
    }
}

// Debugging: dump the first car's images to check if they are initialized
if ($this->getParameter('kernel.environment') === 'dev') {
    dump($cars[0]->getImages());
}

        // Utilize the method to get all cars of a specific brand
        $carsByBrand = $carRepository->findCarsByBrand('VotreMarque');

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars,
            'carsByBrand' => $carsByBrand,
        ]);
    }
}

