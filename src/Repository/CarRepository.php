<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    /**
     * Récupère toutes les voitures d'une marque spécifique
     *
     * @param string $brand
     * @return Car[]
     */
/**

 */

  public function findAllWithImages(): array
    {
        return $this->createQueryBuilder('car')
            ->getQuery()
            ->getResult();
            }
            }


