<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Channel;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findRandomArticlesByChannelAndNumberOfResults(Channel $channel, int $nbResults)
    {
        return $this->createQueryBuilder('a')
            ->join('a.channel', 'c')
            ->andWhere('c = :channel')
            ->setParameter('channel', $channel)
            ->orderBy('RAND()')
            ->setMaxResults($nbResults)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByChannelAndWriter(Channel $channel,User $writer)
    {
        return $this->createQueryBuilder('a')
            ->join('a.channel', 'c')
            ->andWhere('c = :channel')
            ->andWhere('a.user = :user')
            ->setParameter('user', $writer)
            ->setParameter('channel', $channel)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findNbOfArticlesByChannelAndWriter(Channel $channel,User $writer)
    {
        return $this->createQueryBuilder('a')
            ->select('count(a.id)')
            ->join('a.channel', 'c')
            ->andWhere('c = :channel')
            ->andWhere('a.user = :user')
            ->setParameter('user', $writer)
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult();
    }

    public function findRandomArticleByAuthorAndMaxResult(User $user, int $nbResult)
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.user = :user')
            ->setParameter('user', $user)
            ->orderBy('RAND()')
            ->setMaxResults($nbResult)
            ->getQuery()
            ->getResult();

        return $qb;
    }


    public function findRandomArticlesByNbOfResults(int $nbResults)
    {
        return $this->createQueryBuilder('a')
            ->orderBy('RAND()')
            ->setMaxResults($nbResults)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findArticleByChannelByDescendingOrder(Channel $channel)
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.channel = :channel')
            ->setParameter('channel', $channel)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    // @todo problem of groupBy mode in SQL, to be solved
    public function findMostLikedArticlesByMaxResult(int $nbResults)
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.likes', 'l')
            ->orderBy("COUNT(l.id)", "DESC")
            ->setMaxResults($nbResults)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByUserInDescOrder(User $user)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.user = :user')
            ->setParameter('user', $user)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findArticlesLikedByUser(User $user)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.likes', 'l')
            ->leftJoin('l.user', 'u')
            ->andWhere('u = :user')
            ->setParameter('user', $user)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
