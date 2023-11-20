<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use App\Repository\SchedulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/voitures', name: 'app_car')]
    public function index(CarRepository $carRepository, SchedulesRepository $schedulesRepository, EntityManagerInterface $entityManager): Response
    {
        // Utilize the repository to get all cars
        $cars = $carRepository->findAll();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
     }
        
        // Utilize the method to get all cars of a specific brand
        $carsByBrand = $carRepository->findCarsByBrand('VotreMarque');

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars,
            'carsByBrand' => $carsByBrand,
            'workingHours' => $workingHours,
            ]);
    }

    #[Route('/voiture/{id}', name: 'app_car_details')]
    public function details(Car $car): Response
    {
        return $this->render('car/details.html.twig', [
            'car' => $car,
        ]);
    }
}
