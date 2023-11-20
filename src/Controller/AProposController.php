<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    #[Route('/a/propos', name: 'app_a_propos')]
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }
        return $this->render('a_propos/index.html.twig', [
            'controller_name' => 'AProposController',
            'workingHours' => $workingHours,
        ]);
    }
}
