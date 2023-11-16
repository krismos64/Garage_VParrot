<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/voitures-occasion', name: 'app_car')]
    public function index(CarRepository $carRepository): 
    Response
    {
        return $this->render('car/index.html.twig', [
            'car' => $carRepository->findAll()
        ]);
    }
}
