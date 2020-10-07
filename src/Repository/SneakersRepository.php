<?php

namespace App\Repository;

use App\Entity\Sneakers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sneakers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sneakers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sneakers[]    findAll()
 * @method Sneakers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SneakersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sneakers::class);
    }

    // /**
    //  * @return Sneakers[] Returns an array of Sneakers objects
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
    public function findOneBySomeField($value): ?Sneakers
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
