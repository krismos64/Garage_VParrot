<?php

namespace App\Repository;

use App\Entity\CarImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarImage>
 *
 * @method CarImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarImage[]    findAll()
 * @method CarImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarImage::class);
    }

    /**
 * Récupère toutes les images associées à une voiture spécifique
 *
 * @param int $carId
 * @return CarImage[]
 */
    public function findImagesByCar(int $carId): array
    {
    return $this->createQueryBuilder('ci')
        ->andWhere('ci.car = :carId')
        ->setParameter('carId', $carId)
        ->getQuery()
        ->getResult();
    }
//    /**
//     * @return CarImage[] Returns an array of CarImage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarImage
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
