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
 * @Route("/")
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
     * @Route("", name="public_home_page", methods={"GET"})
     */
    public function publicHomePage()
    {
        $user = $this->getUser();
        $bookMarkedArticles = [];
        $followedWriters = [];

        if ($user instanceof User) {
            if (count($user->getBookMarks()) > 0) {
                foreach ($user->getBookMarks() as $bookMark) {
                    if ($bookMark->getArticle() instanceof Article) {
                        $bookMarkedArticles[] = $bookMark->getArticle();
                    }
                }
            }

            if (count($user->getSubscribedFollows()) > 0) {
                foreach ($user->getSubscribedFollows() as $follow) {
                    if ($follow->getWriter() instanceof User) {
                        $followedWriters[] = $follow->getWriter();
                    }
                }
            }

            // get the 5 most liked articles of the website
            // $this->articleRepository->findFiveMoreLikedArticles();

            // get 5 random articles
            dump($this->articleRepository->findFiveRandomArticles());

            //$this->channelRepository;


            return $this->render('general/public_home_page_for_logged.html.twig', [
                'bookmarkedArticles' => $bookMarkedArticles,
                'followedWriters' => $followedWriters
            ]);
        }

        dump($this->articleRepository->findFiveRandomArticles());

        return $this->render('general/public_home_page_for_anonymous.html.twig', [
            'trendingArticles' => [],
        ]);


    }
}


 