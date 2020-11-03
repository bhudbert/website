<?php

namespace App\Repository;

use App\Entity\TextBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TextBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextBlock[]    findAll()
 * @method TextBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextBlock::class);
    }

    // /**
    //  * @return TextBlock[] Returns an array of TextBlock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextBlock
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
