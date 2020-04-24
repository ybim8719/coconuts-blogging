<?php

namespace App\Repository;

use App\Entity\EntityPathName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EntityPathName|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntityPathName|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntityPathName[]    findAll()
 * @method EntityPathName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntityPathNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntityPathName::class);
    }

    // /**
    //  * @return EntityPathName[] Returns an array of EntityPathName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntityPathName
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
