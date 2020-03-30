<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\User;
use App\Entity\UserLike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserLike|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserLike|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserLike[]    findAll()
 * @method UserLike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserLikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserLike::class);
    }


    public function findByArticleAndUser(Article $article, User $user)
    {
        $qb = $this->createQueryBuilder('u')
            ->andWhere('u.likedArticle = :article')
            ->andWhere('u.user = :user')
            ->setParameter('article', $article)
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();
    }


    public function findByArticleCommentAndUser(ArticleComment $articleComment, User $user)
    {
        $qb = $this->createQueryBuilder('u')
            ->andWhere('u.likedArticleComment = :article')
            ->andWhere('u.user = :user')
            ->setParameter('article', $articleComment)
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();
    }



    // /**
    //  * @return UserLike[] Returns an array of UserLike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserLike
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
