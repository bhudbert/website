<?php

namespace App\Repository;

use App\Entity\Gallery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gallery|null find($id, $lockmode = null, $lockversion = null)
 * @method Gallery|null findoneby(array $criteria, array $orderby = null)
 * @method Gallery[]    findall()
 * @method Gallery[]    findby(array $criteria, array $orderby = null, $limit = null, $offset = null)
 */
class GalleryRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gallery::class);
    }


    // /**
    //  * @return File[] Returns an array of File objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?File
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
