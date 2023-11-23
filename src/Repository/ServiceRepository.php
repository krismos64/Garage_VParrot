<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class);
    }

    public function findAllWithImages(): array
    {
        return $this->createQueryBuilder('service')
            ->leftJoin('service.images', 'images')
            ->addSelect('images')
            ->getQuery()
            ->getResult();
    }
}