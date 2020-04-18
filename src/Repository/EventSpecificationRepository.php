<?php

namespace App\Repository;

use App\Entity\EventSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EventSpecification|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventSpecification|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventSpecification[]    findAll()
 * @method EventSpecification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventSpecificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSpecification::class);
    }

    // /**
    //  * @return EventSpecification[] Returns an array of EventSpecification objects
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
    public function findOneBySomeField($value): ?EventSpecification
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
