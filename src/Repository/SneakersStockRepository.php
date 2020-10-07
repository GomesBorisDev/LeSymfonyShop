<?php

namespace App\Repository;

use App\Entity\SneakersStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SneakersStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method SneakersStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method SneakersStock[]    findAll()
 * @method SneakersStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SneakersStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SneakersStock::class);
    }

    // /**
    //  * @return SneakersStock[] Returns an array of SneakersStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SneakersStock
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
