<?php

namespace App\Repository;

use App\Entity\OptionTypeRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptionTypeRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionTypeRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionTypeRoom[]    findAll()
 * @method OptionTypeRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionTypeRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionTypeRoom::class);
    }

    // /**
    //  * @return OptionTypeRoom[] Returns an array of OptionTypeRoom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OptionTypeRoom
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
