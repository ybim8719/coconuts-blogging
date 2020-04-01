<?php


namespace App\Controller;


use App\Entity\ArticleComment;
use App\Entity\ArticleVisit;
use App\Entity\BookMark;
use App\Entity\Follow;
use App\Entity\User;
use App\Entity\UserLike;
use App\Repository\ArticleRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/channel")
 */
class ChannelController extends AbstractController
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
    private $articleVisitRepository;
    private $bookmarkRepository;
    private $followRepository;
    private $articleCommentsRepository;

    private $userLikeRepository;

    private $logger;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->articleVisitRepository = $em->getRepository(ArticleVisit::class);
        $this->userLikeRepository = $em->getRepository(UserLike::class);
        $this->bookmarkRepository = $em->getRepository(BookMark::class);
        $this->followRepository = $em->getRepository(Follow::class);
        $this->articleCommentsRepository = $em->getRepository(ArticleComment::class);
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * Display list of channels subscribed by user.
     * @Route("/", name="channelIndexPage", methods={"GET"})
     */
    public function channelIndexPage(ArticleRepository $articleRepository): Response
    {
        return $this->render('channel/channel_index_page.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }
}