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
     

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CarCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Espace administrateur Garage V.Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Voitures occasion', 'fas fa-list', Car::class);
        yield MenuItem::linkToCrud('Images des voitures', 'fas fa-list', CarImage::class);
        yield MenuItem::linkToCrud('Avis clients', 'fas fa-list', Reviews::class);
        yield MenuItem::linkToCrud('Services du garage', 'fas fa-list', Service::class);
        yield MenuItem::linkToCrud('Images des services', 'fas fa-list', ServiceImage::class);
        yield MenuItem::linkToCrud('Horaires du garage', 'fas fa-list', Schedules::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-list', User::class);
    }
}
