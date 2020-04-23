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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
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
    private $eventSpecificationRepository;
    private $channelRepository;

    private $userLikeRepository;

    private $logger;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->eventSpecificationRepository = $em->getRepository(EventSpecification::class);
        $this->articleVisitRepository = $em->getRepository(ArticleVisit::class);
        $this->userLikeRepository = $em->getRepository(UserLike::class);
        $this->bookmarkRepository = $em->getRepository(BookMark::class);
        $this->followRepository = $em->getRepository(Follow::class);
        $this->channelRepository = $em->getRepository(Channel::class);
        $this->articleCommentsRepository = $em->getRepository(ArticleComment::class);
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/create", name="article_create", methods={"GET","POST"})
     */
    public function create(Request $request, EventDispatcherInterface $eventDispatcher): Response
    {
        $writer = $this->getUser();
        if ($writer == null) {
            return $this->redirectToRoute('app_login');
        }
        if (!$writer instanceof User) {
            throw new Exception('Article submitted but blocked because user is not logged...');
        }

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article, [
            'user' => $writer
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setUser($writer);
            $this->em->persist($article);
            $this->em->flush();
            $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::PUBLISH_ARTICLE_CODE]);
            $event = new CreateEventAndNotificationsEvent($writer, $eventSpecification, $article);
            $eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);
            $this->addFlash('success', 'Votre article est maintenant publié!');
            return $this->redirectToRoute('article_show', ["id" => $article->getId()]);
        }

        return $this->render('article/create.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Request $request, Article $article, EventDispatcherInterface $eventDispatcher): Response
    {
        $userHasLiked = false;
        $hasBookmark = false;
        $isFollowing = false;



        if ($request->getClientIp() != null) {
            if (empty($this->articleVisitRepository->findByArticleAndIp($article, $request->getClientIp()))) {
                $event = new AddArticleVisitEvent($article, $request->getClientIp());
                $eventDispatcher->dispatch($event, AddArticleVisitEvent::NAME);
            }
        }

        if ($this->getUser() != null) {
            $actualLikeOfUserForThisArticle = $this->userLikeRepository->findByArticleAndUser($article, $this->getUser());
            if (!empty($actualLikeOfUserForThisArticle)){
                $userHasLiked = true;
                if (count($actualLikeOfUserForThisArticle) > 1) {
                    $this->logger->error("User n°".$this->getUser()->getId()." has liked more than 1 time the article id".$article->getId().'// Please fix with in DB');
                }
            }

            $actualBookmarkOfUserForThisArticle = $this->bookmarkRepository->findByArticleAndUser($article, $this->getUser());
            if (!empty($actualBookmarkOfUserForThisArticle)){
                $hasBookmark = true;
                if (count($actualBookmarkOfUserForThisArticle) > 1) {
                    $this->logger->error("User n°".$this->getUser()->getId()." has bookmarked more than 1 time the article id".$article->getId().'// Please fix with in DB');
                }
            }

            $follows = $this->followRepository->findByUserAndWriter($this->getUser(), $article->getUser());
            if (count($follows) > 0) {
                $isFollowing = true;
            }
        }

        $comments = $this->articleCommentsRepository->findByArticle($article);

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'userHasLiked' => $userHasLiked,
            'hasBookmark' => $hasBookmark,
            'isFollowing' => $isFollowing,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
            $this->addFlash('article supprimé');
        }
    }
}
