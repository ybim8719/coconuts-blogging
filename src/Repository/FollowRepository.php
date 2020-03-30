<?php

namespace App\Repository;

use App\Entity\Follow;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Follow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Follow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Follow[]    findAll()
 * @method Follow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FollowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Follow::class);
    }

    public function findByUserAndWriter(User $user, User $writer)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.follower = :follower')
            ->andWhere('f.writer = :writer')
            ->setParameter('follower', $user)
            ->setParameter('writer', $writer)
            ->getQuery()
            ->getResult()
        ;
    }
}
