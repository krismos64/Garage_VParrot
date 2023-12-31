<?php

namespace App\DataFixtures;

use App\Entity\Reviews;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $review=new Reviews();
        $review->setFirstname('Stacy');
        $review->setLastName('Moss');
        $review->setEmail('stacy@gmail.com');
        $review->setRating(5);
        $review->setMessage('Au top ce garage !');
        $review->setPublishedAt(new \DateTime('06/01/2023'));
        $review->setIsApproved(true);
        $manager->persist($review);

        $review2 = new Reviews();
        $review2->setFirstname('Esteban');
        $review2->setLastName('Ocon');
        $review2->setEmail('oconesteban@gmail.com');
        $review2->setRating(5);
        $review2->setMessage('Je suis très satisfait, ma formule 1 avit un problème pour accélérer, Mr Parrot a su trouver le problème rapidement je recommande ce garage!');
        $review2->setPublishedAt(new \DateTime('06/06/2022'));
        $review2->setIsApproved(true);
        $manager->persist($review2);

        $review3 = new Reviews();
        $review3->setFirstname('Emilia');
        $review3->setLastName('Clark');
        $review3->setEmail('queenkalicee@hotmail.com');
        $review3->setRating(4);
        $review3->setMessage('Génial, un point en moins pour la fermeture le dimanche !');
        $review3->setPublishedAt(new \DateTime('12/12/2022'));
        $review3->setIsApproved(true);
        $manager->persist($review3);

        $review4 = new Reviews();
        $review4->setFirstname('Lebron');
        $review4->setLastName('James');
        $review4->setEmail('l.james@laposte.fr');
        $review4->setRating(5);
        $review4->setMessage('Le meilleur garage au monde !');
        $review4->setPublishedAt(new \DateTime('04/07/2023'));
        $review4->setIsApproved(false);
        $manager->persist($review4);

        $review5 = new Reviews();
        $review5->setFirstname('Luc');
        $review5->setLastName('Skywalker');
        $review5->setEmail('skyluc@yahoo.fr');
        $review5->setRating(4);
        $review5->setMessage('Sympathique mais locaux un peu petits...');
        $review5->setPublishedAt(new \DateTime('10/07/2023'));
        $review5->setIsApproved(false);
        $manager->persist($review5);

        $review6 = new Reviews();
        $review6->setFirstname('Elon');
        $review6->setLastName('Musk');
        $review6->setEmail('elonmusk@laposte.fr');
        $review6->setRating(5);
        $review6->setMessage('Ils ont pu réparer ma fusée en 5minutes, de vrais pro !');
        $review6->setPublishedAt(new \DateTime('11/09/2023'));
        $review6->setIsApproved(false);
        $manager->persist($review6);

        $manager->flush();
    }
}












