<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel('Title'),
            TextareaField::new('description'),
            MoneyField::new('price')->setCurrency('EUR'),
            IntegerField::new('km'),
            IntegerField::new('year'),
            ImageField::new('imagePath', 'Car Image')
                ->setBasePath('/uploads/cars')
                ->hideOnForm(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['id' => 'DESC']);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        try {
            $uploadedFile = $this->request->files->get('imageFile');

            if ($uploadedFile instanceof UploadedFile) {
                // Générer un nom de fichier unique
                $newFilename = uniqid().'.'.$uploadedFile->guessExtension();

                // Déplacer le fichier dans le répertoire d'upload
                $uploadedFile->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads/cars',
                    $newFilename
                );

                // Stocker le nom du fichier dans l'entité Car
                $entityInstance->setImagePath($newFilename);
            }

            // Persistez l'entité
            $entityManager->persist($entityInstance);
            $entityManager->flush();

            $this->addFlash('success', 'Car added successfully');
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
