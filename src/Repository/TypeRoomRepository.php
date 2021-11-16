<?php

namespace App\Repository;

use App\Entity\TypeRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRoom[]    findAll()
 * @method TypeRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRoom::class);
    }
}
