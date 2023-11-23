<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

 public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Title',),
            AssociationField::new('images')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
            CollectionField::new('images')
                ->onlyOnForms(),
        ];
    }
}
