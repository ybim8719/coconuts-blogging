<?php

namespace App\Repository;

use App\Entity\Channel;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Channel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Channel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Channel[]    findAll()
 * @method Channel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChannelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Channel::class);
    }

    public function findBySubscriber(User $subscriber)
    {
        return $this->createQueryBuilder('c')
            ->join('c.users', 'u')
            ->andWhere('u = :subscriber')
            ->setParameter('subscriber', $subscriber)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
      public function findRandomChannelsNotInListAndByNumberOfResults($value): ?Channel
      {
          return $this->createQueryBuilder('c')
              ->andWhere('c.exampleField = :val')
              ->setParameter('val', $value)
              ->getQuery()
              ->getOneOrNullResult()
          ;
      }
      */

    public function findRandomChannelsByNumberOfResults($value)
    {
        return $this->createQueryBuilder('c')
            ->orderBy('rand()')
            ->setMaxResults($value)
            ->getQuery()
            ->getResult()
        ;
    }

}
