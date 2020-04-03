<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\BookMark;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BookMark|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookMark|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookMark[]    findAll()
 * @method BookMark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookMarkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookMark::class);
    }

    public function findByArticleAndUser(Article $article, User $user)
    {
        $qb = $this->createQueryBuilder('b')
            ->andWhere('b.article = :article')
            ->andWhere('b.user = :user')
            ->setParameter('article', $article)
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();
    }

    public function findRandomBookmarksByUserAndMaxResult(User $user, int $nbResults)
    {
        return $this->createQueryBuilder('b')
            ->join('b.user', 'u')
            ->andWhere('u = :user')
            ->setParameter('user', $user)
            ->orderBy('rand()')
            ->setMaxResults($nbResults)
            ->getQuery()
            ->getResult();
    }
}
