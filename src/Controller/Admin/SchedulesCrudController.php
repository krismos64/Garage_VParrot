<?php

namespace App\Controller\Admin;

use App\Entity\Schedules;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SchedulesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedules::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Day', 'Jour'),
            TextField::new('OpeningTime', 'Heure ouverture'),
            TextField::new('ClosingTime', 'Heure fermeture'),
        ];
    }
}