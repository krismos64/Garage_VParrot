<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'workingHours' => $workingHours,
        ]);
    }
}
