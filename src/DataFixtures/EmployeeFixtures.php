<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $employee = new Employee();
        $employee->setEmail('rlegrand@gmail.com');
        $employee->setPassword('Roro782@');
        $employee->setFirstname('Romain');
        $employee->setLastname('Legrand');
        $manager->persist($employee);

        $employee2 = new Employee();
        $employee2->setEmail('cmurcie18@gmail.com');
        $employee2->setPassword('babouinM57');
        $employee2->setFirstname('Cyril');
        $employee2->setLastname('Murcie');
        $manager->persist($employee2);

        $employee3 = new Employee();
        $employee3->setEmail('festayre64@gmail.com');
        $employee3->setPassword('Cacahuete87');
        $employee3->setFirstname('Franck');
        $employee3->setLastname('Duval');
        $manager->persist($employee3);

        $employee4 = new Employee();
        $employee4->setEmail('Raki457@yahoo.fr');
        $employee4->setPassword('Serpentardu64');
        $employee4->setFirstname('Chris');
        $employee4->setLastname('Raki');
        $manager->persist($employee4);

        $manager->flush();
    }
}