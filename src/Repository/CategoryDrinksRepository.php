<?php

namespace App\Repository;

use App\Entity\CategoryDrinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryDrinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryDrinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryDrinks[]    findAll()
 * @method CategoryDrinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryDrinksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryDrinks::class);
    }

    // /**
    //  * @return CategoryDrinks[] Returns an array of CategoryDrinks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryDrinks
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
