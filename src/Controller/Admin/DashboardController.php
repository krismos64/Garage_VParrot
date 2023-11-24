<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\CarImage;
use App\Entity\Reviews;
use App\Entity\Schedules;
use App\Entity\Service;
use App\Entity\ServiceImage;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(CarCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Espace administrateur Garage V.Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Gestion des Voitures');
        yield MenuItem::linkToCrud('Voitures occasion', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Images des voitures', 'fas fa-images', CarImage::class);
        yield MenuItem::linkToCrud('Avis clients', 'fas fa-list', Reviews::class);

        yield MenuItem::section('Gestion des Services');
        yield MenuItem::linkToCrud('Services du garage', 'fas fa-tools', Service::class);
        yield MenuItem::linkToCrud('Images des services', 'fas fa-images', ServiceImage::class);
        yield MenuItem::linkToCrud('Horaires du garage', 'fas fa-clock', Schedules::class);

        yield MenuItem::section('Gestion du personnel');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
    }
}