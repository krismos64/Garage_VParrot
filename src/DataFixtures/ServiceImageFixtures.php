<?php

namespace App\DataFixtures;

use App\Entity\ServiceImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Load ServiceImages for Service1
        $this->loadServiceImagesForService($manager, $this->getReference('Service-1'), 'Réparation mécanique', 'VOITURE NOIRE EN REPARATION');

        // Load ServiceImages for Service2
        $this->loadServiceImagesForService($manager, $this->getReference('Service-2'), 'Entretien et révision', 'Vidange huile');

        // Load ServiceImages for Service3
        $this->loadServiceImagesForService($manager, $this->getReference('Service-3'), 'Pare-brise et vitrage', 'Réparation pare-brise');
        // Load ServiceImages for Service4
        $this->loadServiceImagesForService($manager, $this->getReference('Service-4'), 'Pneumatique', 'Changement Pneus');
    
        $manager->flush();
    }

    private function loadServiceImagesForService(ObjectManager $manager, $serviceReference, $title, $description): void
    {
        $ServiceImage = new ServiceImage();
        $ServiceImage->setTitle($title);
        $ServiceImage->setDescription($description);
        $ServiceImage->setService($serviceReference);
        $manager->persist($ServiceImage);
    }
      }