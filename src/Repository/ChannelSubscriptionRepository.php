<?php

namespace App\Repository;

use App\Entity\Channel;
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

}
