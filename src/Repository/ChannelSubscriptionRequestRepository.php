<?php

namespace App\Repository;

use App\Entity\Channel;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\User;
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

    public function findByChannelAndStatusCode(Channel $channel, int $statusCode)
    {
        return $this->createQueryBuilder('csr')
            ->andWhere('csr.channel = :channel')
            ->andWhere('csr.status = :code')
            ->setParameter('channel', $channel)
            ->setParameter('code', $statusCode)
            ->orderBy('csr.createdAt', 'desc')
            ->getQuery()
            ->getResult();
    }

    public function findByChannelAndUserAndStatusCode(Channel $channel, User $user, int $code)
    {
        return $this->createQueryBuilder('csr')
            ->andWhere('csr.channel = :channel')
            ->andWhere('csr.applicant = :user')
            ->andWhere('csr.status = :code')
            ->setParameter('user', $user)
            ->setParameter('code', $code)
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult();
    }

    public function findByChannelAndUser(Channel $channel, User $user)
    {
        return $this->createQueryBuilder('csr')
            ->andWhere('csr.channel = :channel')
            ->andWhere('csr.applicant = :user')
            ->setParameter('user', $user)
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult();
    }


}
