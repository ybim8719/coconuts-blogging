<?php

namespace App\Repository;

use App\Entity\Channel;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

  /**
   * Returns  
   *
   * @return void
   */
    public function findAllWritersOrderedByViews()
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.hasWritten IS NOT Null')
            ->orderBy('u.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * return an array with lines made with the subscriber object + a boolean status
     * @param Channel $channel
     * @return mixed
     */
    public function findSubscribersByChannelWithAdminStatus(Channel $channel)
    {
        return $this->createQueryBuilder('u')
            ->addSelect('cs.isAdmin')
            ->addSelect('cs.createdAt')
            ->join('u.channelSubscriptions', 'cs')
            ->join('cs.channel', "c")
            ->andWhere('c = :channel')
            ->setParameter('channel', $channel)
            ->orderBy('cs.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findWritersFollowedByUser(User $user)
    {
        return $this->createQueryBuilder('u')
            ->join('u.subscribedFollows', 'i')
            ->join('i.follower', "f")
            ->andWhere('f = :user')
            ->setParameter('user', $user)
            ->orderBy('i.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findWriterByChannelWithAdminStatus(Channel $channel)
    {
        return $this->createQueryBuilder('u')
            ->addSelect('cs.createdAt')
            ->leftJoin('u.articles', 'a')
            ->leftJoin('a.channel', "c")
            ->leftJoin('u.channelSubscriptions', 'cs')
            ->andWhere('cs.channel = :channel')
            ->andWhere('c = :channel')
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult();
    }
}
