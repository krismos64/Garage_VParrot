<?php

namespace App\Controller\Admin;

use App\Entity\CarImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            // Add other fields for CarImage entity...
        ];
    }
}
