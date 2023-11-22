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


// CarRepository.php

public function findByBrand(string $brand): array
{
    return $this->createQueryBuilder('c')
        ->andWhere('c.brand = :brand')
        ->setParameter('brand', $brand)
        ->getQuery()
        ->getResult();
}

public function __call($method, $arguments)
{
    // Check if the method name starts with "findCarsBy"
    if (strpos($method, 'findCarsBy') === 0) {
        // Extract the brand name from the method name
        $brand = lcfirst(substr($method, 11));

        return $this->findBy(['brand' => $brand]);
    }

}
}