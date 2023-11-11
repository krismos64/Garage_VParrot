<?php

namespace App\DataFixtures;

use App\Entity\CarImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Load CarImages for Car1
        $this->loadCarImagesForCar($manager, $this->getReference('car-1'), 'BMW_Image1', 'BMW SPORT BLANCHE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-1'), 'BMW_Image2', 'Intérieur BMW');

        // Load CarImages for Car2
        $this->loadCarImagesForCar($manager, $this->getReference('car-2'), 'VW_Golf_Image1', 'VW Golf7 BLANCHE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-2'), 'VW_Golf_Image2', 'VW Golf7 BLANCHE ARRIERE');

        // Load CarImages for Car3
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'PEUGEOT_208_Image1', 'PEUGEOT 208 BLEUE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'PEUGEOT_208_Image2', 'PEUGEOT 208 BLEUE ARRIERE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'PEUGEOT_208_Image3', 'PEUGEOT 208 BLEUE COTE');

        // Load CarImages for Car4
        $this->loadCarImagesForCar($manager, $this->getReference('car-4'), 'CAPTUR_Image1', 'RENAULT CAPTURE ORANGE COTE GAUCHE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-4'), 'CAPTUR_Image2', 'RENAULT CAPTURE ORANGE COTE DROIT');

        // Load CarImages for Car5
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'CLIO_Image1', 'RENAULT CLIO 4 BLANCHE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'CLIO_Image2', 'RENAULT CLIO 4 BLANCHE COTE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'CLIO_Image3', 'RENAULT CLIO 4 BLANCHE AVANT');



        $manager->flush();
    }

    private function loadCarImagesForCar(ObjectManager $manager, $carReference, $title, $description): void
    {
        $carImage = new CarImage();
        $carImage->setTitle($title);
        $carImage->setDescription($description);
        $carImage->setCar($carReference);
        $manager->persist($carImage);
    }
      }