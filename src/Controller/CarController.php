<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/voitures', name: 'app_car')]
    public function index(CarRepository $carRepository): Response
    {
        // Utilize the repository to get all cars
        $cars = $carRepository->findAll();

        // Debugging: dump the first car's images to check if they are initialized
        dump($cars[0]->getImages());

        // Utilize the method to get all cars of a specific brand
        $carsByBrand = $carRepository->findCarsByBrand('VotreMarque');

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars,
            'carsByBrand' => $carsByBrand,
        ]);
    }
}