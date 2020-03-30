<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleVisit;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/admin/article-visit")
 */
class ArticleVisitController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    private $articleVisitRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->articleVisitRepository = $em->getRepository(ArticleVisit::class);
        $this->em = $em;
    }

    /**
     * @Route("/show-visits-of-article/{idArticle}", name="articleVisit_showVisitsOfArticle", requirements={"idArticle" = "\d+"})
     * @ParamConverter("article",options={"id" = "idArticle"})
     */
    public function showVisitsOfArticle(Article $article): Response
    {
        return $this->render('articleVisit/show-visits-of-article.html.twig', [
            'visits' => $this->articleVisitRepository->findVisitsByArticle($article),
            'article' => $article
        ]);
    }

    /**
     * @Route("/show-visits-of-article/{idArticle}", name="articleVisit_showVisitsOfArticle", requirements={"idArticle" = "\d+"})
     * @ParamConverter("article",options={"id" = "idArticle"})
     */
    public function removeAllVisitsOfArticle(Article $article)
    {
        $visits = $this->articleVisitRepository->findVisitsByArticle($article);
        foreach ($visits as $visit) {
            $this->em->remove($visit);
        }

        $this->em->flush();
    }
}







