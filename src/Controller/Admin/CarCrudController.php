<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('km'),
            TextField::new('year'),
            TextField::new('brand'),
            TextField::new('model'),
            TextField::new('price'),
            TextEditorField::new('description'),
            AssociationField::new('images')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
            CollectionField::new('images')
                ->onlyOnForms(),
        ];
    }
}
