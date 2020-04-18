<?php

namespace App\Repository;

use App\Entity\NotificationEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NotificationEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotificationEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotificationEvent[]    findAll()
 * @method NotificationEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationEvent::class);
    }

    // /**
    //  * @return NotificationEvent[] Returns an array of NotificationEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NotificationEvent
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
