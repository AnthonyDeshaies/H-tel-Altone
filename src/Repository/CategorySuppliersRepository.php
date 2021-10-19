<?php

namespace App\Repository;

use App\Entity\CategorySuppliers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorySuppliers|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorySuppliers|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorySuppliers[]    findAll()
 * @method CategorySuppliers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorySuppliersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorySuppliers::class);
    }

    // /**
    //  * @return CategorySuppliers[] Returns an array of CategorySuppliers objects
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
    public function findOneBySomeField($value): ?CategorySuppliers
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
