<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $car = new Car();
        $car->setname('BMW SPORT EDITION BLANCHE');
        $car->setbrand('BMW');
        $car->setmodel('SPORT EDITION');
        $car->setKm(25700);
        $car->setYear(2018);
        $car->setprice(35000);
        $car->setDescription('La BMW édition sport était proposée en deux versions de carrosserie, comme modèle à 
        trois et à cinq portes. Ce modèle à trois portes avec son concept d’espace variable, dispose d’un volume de
        presque 2000 litres lors du rabattement des sièges arrière et du siège du convoyeur. Ce grand volume résulte
        surtout de la construction spécifique de la grande hauteur de cette incroyable voiture.');
        $manager->persist($car);

        $car2 = new Car();
        $car2->setname('VOLKSWAGEN GOLF 7 BLANCHE');
        $car2->setbrand('VOLKSWAGEN');
        $car2->setmodel('GOLF 7');
        $car2->setKm(55700);
        $car2->setYear(2016);
        $car2->setprice(11000);
        $car2->setDescription('Un moteur essence et un moteur électrique combinés. Passez d’un transport purement 
        électrique, sans émissions de gaz d’échappement, à un mélange d’essence et d’électrique afin de réduire les 
        émissions sur les longs trajets. La recharge électrique de votre PHEV se fait en toute simplicité depuis votre
        domicile ou sur votre lieu de destination.');
        $manager->persist($car2);

        $car3 = new Car();
        $car3->setname('PEUGEOT 208 BLEUE');
        $car3->setbrand('PEUGEOT');
        $car3->setmodel('208');
        $car3->setKm(85700);
        $car3->setYear(2015);
        $car3->setprice(7500);
        $car3->setDescription('La voiture parfaite ! Le confort est irréprochable, la finition le choix des matériaux 
        fait de cette voiture l’une des meilleures au monde. Idéale pour les longs trajets comme les plus courts.');
        $manager->persist($car3);

        $car4 = new Car();
        $car4->setname('RENAULT CAPTURE ORANGE');
        $car4->setbrand('RENAULT');
        $car4->setmodel('CAPTUR');
        $car4->setKm(95100);
        $car4->setYear(2018);
        $car4->setprice(8500);
        $car4->setDescription('La voiture a été entretenue par nos soins depuis le début, elle est dans un état irreprochable !');
        $manager->persist($car4);

        $car5 = new Car();
        $car5->setname('RENAULT CLIO 4 BLANCHE');
        $car5->setbrand('RENAULT');
        $car5->setmodel('CLIO 4');
        $car5->setKm(65220);
        $car5->setYear(2017);
        $car5->setprice(8100);
        $car5->setDescription('La voiture a été révision chez nous, controle technique ok dépechez-vous!');
        $manager->persist($car5);

        $manager->flush();

    }
}