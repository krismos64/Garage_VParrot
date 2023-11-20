<?php

namespace App\Repository;

use App\Entity\Hola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hola>
 *
 * @method Hola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hola[]    findAll()
 * @method Hola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HolaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hola::class);
    }

//    /**
//     * @return Hola[] Returns an array of Hola objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Hola
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
