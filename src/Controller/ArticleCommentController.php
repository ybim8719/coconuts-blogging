<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\EventSpecification;
use App\Entity\User;
use App\Event\CreateEventAndNotificationsEvent;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article-comment")
 */
class ArticleCommentController extends AbstractController
{
    private $em;
    private $userRepository;
    private $articleCommentRepository;
    private $logger;
    private $eventSpecificationRepository;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->articleCommentRepository = $em->getRepository(ArticleComment::class);
        $this->eventSpecificationRepository = $em->getRepository(EventSpecification::class);
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * @Route("/ajax-add-comment-to-article/{idArticle}", name= "articleComment_ajaxAddCommentToArticle", options = { "expose" = true })
     * @ParamConverter("article",options={"id" = "idArticle"})
     * @param Request $request
     * @return Response
     */
    public function ajaxAddCommentToArticle(Request $request, Article $article, EventDispatcherInterface $eventDispatcher)
    {
        $userId = $request->request->get('visitorId');
        $text = $request->request->get('newCommentText');

        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        $comment = new ArticleComment();
        $comment->setContent($text);
        $comment->setArticle($article);
        $comment->setAuthor($user);
        $this->em->persist($comment);
        $this->em->flush();

        $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::COMMENT_AN_ARTICLE]);
        $event = new CreateEventAndNotificationsEvent($user, $eventSpecification, $comment);
        $eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);

        $response = [
            "code" => 200,
            'message' => "Commentaire ajouté!",
            "commentId" => $comment->getId(),
            "isAuthor" => $article->getUser()->getId() == $user->getId() ? true : false,
            "authorUsername" => $comment->getAuthor()->getUsername(),
            "commentAuthor" => $comment->getContent()
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/ajax-remove-comment-from-article/{idComment}", name="articleComment_ajaxRemoveCommentFromArticle", options = { "expose" = true })
     * @ParamConverter("articleComment",options={"id" = "idComment"})
     * @param Request $request
     * @return Response
     */
    public function ajaxRemoveCommentFromArticle(Request $request, ArticleComment $articleComment, EventDispatcherInterface $eventDispatcher)
    {
        $userId = $request->request->get('visitorId');
        $articleId = $request->request->get('articleId');
        $commentId = $articleComment->getId();

        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }
        $commentToRemove = $this->articleCommentRepository->find($articleComment);

        if (empty($commentToRemove)) {
            $this->returnInvalidJsonResponse('Can\'t remove comment from article since it couldn t be found in DB');
        }

        if ($commentToRemove->getAuthor()->getId() != $user->getId() && !$user->getIsAdmin()) {
            $this->returnInvalidJsonResponse('The user has no right to remove a comment written by other user');
        }

        if ($commentToRemove->getArticle()->getId() != $articleId && !$user->getIsAdmin()) {
            $this->returnInvalidJsonResponse('the delete action was not made from the article related to the comment');
        }

        $this->em->remove($commentToRemove);
        $this->em->flush();

        $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::REMOVE_AN_ARTICLE_COMMENT]);
        $event = new CreateEventAndNotificationsEvent($user, $eventSpecification, $commentToRemove);
        $eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);

        $response = [
            "code" => 200,
            'message' => "Le commentaire n° ".$commentId." a été supprimé!",
            "deletedCommentId" => $commentId
        ];

        return new JsonResponse($response);
    }

    public function ajaxUpdateArticleComment()
    {

    }


    private function returnInvalidJsonResponse(string $message)
    {
        $response = array(
            "code" => 500,
            'message' => $message,
        );

        return new JsonResponse($response);
    }

    /**
     * @Route("/show/{idComment}", name="articleComment_show", options = { "expose" = true })
     * @ParamConverter("articleComment",options={"id" = "idComment"})
     * @param Request $request
     * @return Response
     */
    public function show(ArticleComment $articleComment)
    {
        return $this->render('/articleComment/show.html.twig', [
            'articleComment' => $articleComment
        ]);
    }


}
