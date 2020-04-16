<?php

namespace App\Repository;

use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\User;
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

    public function findByChannelAndUser(Channel $channel, User $user)
    {
        return $this->createQueryBuilder('cs')
            ->andWhere('cs.channel = :channel')
            ->andWhere('cs.user = :user')
            ->setParameter('user', $user)
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult();
    }

    public function findByUserChannelAndStatus(User $user, Channel $channel, bool $isAdmin)
    {
        return $this->createQueryBuilder('cs')
            ->andWhere('cs.channel = :channel')
            ->andWhere('cs.user = :user')
            ->andWhere('cs.isAdmin = :isAdmin')
            ->setParameter('user', $user)
            ->setParameter('channel', $channel)
            ->setParameter('isAdmin', $isAdmin)
            ->getQuery()
            ->getResult();
    }


}
