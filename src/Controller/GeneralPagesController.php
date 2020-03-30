<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use App\Service\Helper\DateCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/general")
 */
class GeneralPagesController extends AbstractController
{
    private $em;
    private $userRepository;
    private $articleRepository;
    private $dateHelper;

    public function __construct(EntityManagerInterface $em, DateCalculator $calculator)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->articleRepository = $em->getRepository(Article::class);
        $this->em = $em;
        $this->dateHelper = $calculator;
    }

    /**
     * @Route("/home", name="public_home_page", methods={"GET"})
     */
    public function publicHomePage()
    {
        $article = $this->articleRepository->find(7);
        dump($article);
        dump($this->dateHelper->convertToAdaptedDuration($article->getCreatedAt()));
        return $this->render('general/public_home_page.html.twig', [
        ]);
    }
}


 