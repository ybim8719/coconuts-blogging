<?php

namespace App\Repository;

use App\Entity\ArticleComment;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ArticleComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleComment[]    findAll()
 * @method ArticleComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleComment::class);
    }

    public function findByArticle($article)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.article = :article')
            ->setParameter('article', $article)
            ->orderBy('a.createdAt', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByUserInDescOrder(User $user)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.author = :user')
            ->setParameter('user', $user)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
