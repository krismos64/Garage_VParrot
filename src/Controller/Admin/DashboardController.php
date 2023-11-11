<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        try {
            $employeeRepository = $this->entityManager->getRepository(Employee::class);
            $employees = $employeeRepository->findAll();

            return $this->render('admin/dashboard/index.html.twig', [
                'employees' => $employees,
            ]);

        } catch (\Exception $e) {
            return $this->render('admin/error.html.twig', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}