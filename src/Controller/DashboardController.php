<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\ArticleVisit;
use App\Entity\BookMark;
use App\Entity\Channel;
use App\Entity\EventSpecification;
use App\Entity\Follow;
use App\Entity\User;
use App\Entity\UserLike;
use App\Event\AddArticleVisitEvent;
use App\Event\CreateEventAndNotificationsEvent;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    private $userRepository;

    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    private $articleRepository;
    private $bookmarkRepository;
    private $followRepository;
    private $articleCommentsRepository;
    private $channelRepository;

    private $userLikeRepository;

    private $logger;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->articleRepository = $em->getRepository(Article::class);
        $this->articleCommentsRepository = $em->getRepository(ArticleComment::class);
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * @Route("/display-articles-dashboard-for-writer/{id}", name="dashboard_displayArticlesDashboardForWriter", methods={"GET"})
     * @ParamConverter("writer",options={"id" = "id"})
     */
    public function displayArticlesDashboardForWriter(User $writer): Response
    {
        if ($this->getUser()->getId() != $writer->getId() && $this->getUser()->getIsAdmin() == false) {
            throw new Exception('unauthorized access');
        }

        $publishedArticles = $this->articleRepository->fndByUserAndStatus($writer, true);
        $draftArticles = $this->articleRepository->fndByUserAndStatus($writer, false);

        return $this->render('dashboard/display_articles_dashboard_for_writer.html.twig', [
            'publishedArticles' => $publishedArticles,
            'draftArticles' => $draftArticles
        ]);
    }


}