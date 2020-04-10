<?php

namespace App\Repository;

use App\Entity\ChannelSubscriptionRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChannelSubscriptionRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChannelSubscriptionRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChannelSubscriptionRequest[]    findAll()
 * @method ChannelSubscriptionRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChannelSubscriptionRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChannelSubscriptionRequest::class);
    }

    // /**
    //  * @return ChannelSubscriptionRequest[] Returns an array of ChannelSubscriptionRequest objects
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
    public function findOneBySomeField($value): ?ChannelSubscriptionRequest
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
