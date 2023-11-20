<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarDetailsController extends AbstractController
{
    #[Route('/voiture/{id}', name: 'app_car_details')]
    public function details(Car $car): Response
    {
        return $this->render('car/details.html.twig', [
            'car' => $car,
        ]);
    }
}
