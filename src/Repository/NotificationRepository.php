<?php

namespace App\Repository;

use App\Entity\Notification;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Notification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notification[]    findAll()
 * @method Notification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }

    public function findNotificationsByUserAndWasRedStatus(User $user, bool $wasRed)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.wasRead = :wasRed')
            ->andWhere('n.recipient = :user')
            ->setParameter('wasRed', $wasRed)
            ->setParameter('user', $user)
            ->orderBy('n.createdAt', 'DESC')
            ->setMaxResults(40)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByUser(User $recipient)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.recipient = :recipient')
            ->setParameter('recipient', $recipient)
            ->orderBy('n.createdAt', 'DESC')
            ->setMaxResults(40)
            ->getQuery()
            ->getResult()
            ;
    }



    public function findNotificationsByWasRedStatus(bool $wasRed)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.wasRead = :wasRed')
            ->setParameter('wasRed', $wasRed)
            ->orderBy('n.createdAt', 'DESC')
            ->setMaxResults(40)
            ->getQuery()
            ->getResult()
        ;
    }
}
