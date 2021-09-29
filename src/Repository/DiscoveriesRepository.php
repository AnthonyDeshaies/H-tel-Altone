<?php

namespace App\Repository;

use App\Entity\Discoveries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Discoveries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discoveries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discoveries[]    findAll()
 * @method Discoveries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscoveriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discoveries::class);
    }

    // /**
    //  * @return Discoveries[] Returns an array of Discoveries objects
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
    public function findOneBySomeField($value): ?Discoveries
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
