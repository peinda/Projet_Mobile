<?php

namespace App\Repository;

use App\Entity\Profils;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Profils|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profils|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profils[]    findAll()
 * @method Profils[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profils::class);
    }

    // /**
    //  * @return Profils[] Returns an array of Profils objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Profils
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
