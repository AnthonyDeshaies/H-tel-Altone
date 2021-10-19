<?php

namespace App\Repository;

use App\Entity\Drinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Drinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drinks[]    findAll()
 * @method Drinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrinksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drinks::class);
    }

    // /**
    //  * @return Drinks[] Returns an array of Drinks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Drinks
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
