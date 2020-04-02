<?php

namespace App\Repository;

use App\Entity\ChannelSubscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChannelSubscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChannelSubscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChannelSubscription[]    findAll()
 * @method ChannelSubscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChannelSubscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChannelSubscription::class);
    }

    // /**
    //  * @return ChannelSubscription[] Returns an array of ChannelSubscription objects
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
    public function findOneBySomeField($value): ?ChannelSubscription
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
