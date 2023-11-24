<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('v.parrot@gmail.com');
        $user->setPassword ('password');
        $user->setFirstname('Vincent');
        $user->setLastname('Parrot');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('cmurcie18@gmail.com');
        $user2->setPassword ('password');
        $user2->setFirstname('Cyril');
        $user2->setLastname('Murcie');
        $user2->setRoles(['ROLE_ADMIN']);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('festayre64@gmail.com');
        $user3->setPassword ('password');
        $user3->setFirstname('Marc');
        $user3->setLastname('Duval');
        $user3->setRoles(['ROLE_ADMIN']);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setEmail('Raki457@yahoo.fr');
        $user4->setPassword ('password');
        $user4->setFirstname('Chris');
        $user4->setLastname('Raki');
        $user4->setRoles(['ROLE_ADMIN']);
        $manager->persist($user4);

        $user5 = new User();
        $user5->setEmail('rlegrand@gmail.com');
        $user5->setPassword ('password');
        $user5->setFirstname('Romain');
        $user5->setLastname('Legrand');
        $user5->setRoles(['ROLE_ADMIN']);
        $manager->persist($user5);

        $manager->flush();
    }
}
