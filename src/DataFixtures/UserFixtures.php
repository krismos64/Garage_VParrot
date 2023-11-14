<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new user();
        $user->setEmail('v.parrot@gmail.com');
        $user->setPassword('Toulouse31');
        $user->setFirstname('Vincent');
        $user->setLastname('Parrot');
        $manager->persist($user);

        $user2 = new user();
        $user2->setEmail('cmurcie18@gmail.com');
        $user2->setPassword('babouinM57');
        $user2->setFirstname('Cyril');
        $user2->setLastname('Murcie');
        $manager->persist($user2);

        $user3 = new user();
        $user3->setEmail('festayre64@gmail.com');
        $user3->setPassword('Cacahuete87');
        $user3->setFirstname('Franck');
        $user3->setLastname('Duval');
        $manager->persist($user3);

        $user4 = new user();
        $user4->setEmail('Raki457@yahoo.fr');
        $user4->setPassword('Serpentardu64');
        $user4->setFirstname('Chris');
        $user4->setLastname('Raki');
        $manager->persist($user4);

        $user5 = new user();
        $user5->setEmail('rlegrand@gmail.com');
        $user5->setPassword('Roro782@');
        $user5->setFirstname('Romain');
        $user5->setLastname('Legrand');
        $manager->persist($user5);

        $manager->flush();
    }
}