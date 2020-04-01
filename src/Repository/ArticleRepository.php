<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Channel;
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

    public function findFourRandomArticlesByChannel(Channel $channel)
    {
        return $this->createQueryBuilder('a')
            ->join('a.channels', 'c')
            ->andWhere('c = :channel')
            ->setParameter('channel', $channel)
            ->orderBy('RAND()')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findFiveRandomArticles()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('RAND()')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }
}
