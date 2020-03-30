<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleVisit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ArticleVisit|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleVisit|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleVisit[]    findAll()
 * @method ArticleVisit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleVisitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleVisit::class);
    }

    public function findByArticleAndIp(Article $article, string $ip)
    {
        $qb = $this->createQueryBuilder('a')
        ->andWhere('a.visitorIp = :ip')
        ->andWhere('a.article = :article')
        ->setParameter('ip', $ip)
        ->setParameter('article', $article);

        return $qb->getQuery()->getResult();
    }

    public function findVisitsByArticle(Article $article)
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.article = :article')
            ->setParameter('article', $article);

        return $qb->getQuery()->getResult();
    }
}
