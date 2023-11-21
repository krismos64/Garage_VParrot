<?php

namespace App\Controller;

use App\Repository\ReviewsRepository;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewsController extends AbstractController
{
    #[Route('/avis-clients', name: 'app_reviews')]
    public function index(ReviewsRepository $reviewsRepository, SchedulesRepository $schedulesRepository): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $reviews = $reviewsRepository->findAll();
        $workingHours = [];
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
         }
        return $this->render('reviews/index.html.twig', [
            'controller_name' => 'ReviewsController',
            'workingHours' => $workingHours,
            'reviews' => $reviews
        ]);
    }
}
