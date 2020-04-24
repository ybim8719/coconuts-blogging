<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\EventSpecification;
use App\Entity\User;
use App\Entity\UserLike;
use App\Event\CreateEventAndNotificationsEvent;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/user-like")
 */
class UserLikeController extends AbstractController
{
    private $em;
    private $userRepository;
    private $userLikeRepository;
    private $logger;
    private $eventSpecificationRepository;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->userLikeRepository = $em->getRepository(UserLike::class);
        $this->eventSpecificationRepository = $em->getRepository(EventSpecification::class);
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * @Route("/ajax-add-like-to-article/{idArticle}", name= "userLike_ajaxAddLikeToArticle", options = { "expose" = true })
     * @ParamConverter("article",options={"id" = "idArticle"})
     * @param Request $request
     * @return Response
     */
    public function ajaxAddLikeToArticle(Request $request, Article $article, EventDispatcherInterface $eventDispatcher)
    {
        $userId = $request->request->get('visitorId');

        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        if (count($this->userLikeRepository ->findByArticleAndUser($article, $user)) > 0) {
            $this->returnInvalidJsonResponse('Can\'t add Like, since the User has already');
        }

        $like = new UserLike();
        $like->setCategory(UserLike::ARTICLE_CATEGORY);
        $like->setUser($user);
        $like->setLikedArticle($article);
        $this->em->persist($like);
        $this->em->flush();

        $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::LIKE_AN_ARTICLE]);
        $event = new CreateEventAndNotificationsEvent($user, $eventSpecification, $article);
        $eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);

        $response = [
            "code" => 200,
            'message' => "Like ajouté!",
            "currentNbOfLikes" => $article->getNbOfLikes(),
            "hasLikedCurrentStatus" => true,
            "modifiedArticleId" => $article->getId()
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/ajax-remove-like-of-artile/{idArticle}", name="userLike_ajaxRemoveLikeOfArticle", options = { "expose" = true })
     * @ParamConverter("article",options={"id" = "idArticle"})
     * @param Request $request
     * @return Response
     */
    public function ajaxRemoveLikeOfArticle(Request $request, Article $article)
    {
        $userId = $request->request->get('visitorId');
        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        $likeToBeRemoved = $this->userLikeRepository ->findByArticleAndUser($article, $user);
        if (empty($likeToBeRemoved) || count($likeToBeRemoved) == 0) {
            $this->returnInvalidJsonResponse('Can\'t remove Like from article since it couldn t be found in DB');
        }

        if (count($likeToBeRemoved) > 1) {
            $this->logger->error("Two articles do exist for user id : ".$userId." and article id = .".$article->getId());
            $this->returnInvalidJsonResponse('Can\'t remove Like from article since it couldn t be found in DB');
        }

        $this->em->remove($likeToBeRemoved[0]);
        $this->em->flush();

        $response = [
            "code" => 200,
            'message' => "Like supprimé!",
            "currentNbOfLikes" => $article->getNbOfLikes(),
            "hasLikedCurrentStatus" => false,
            "modifiedArticleId" => $article->getId()
        ];

        return new JsonResponse($response);
    }

    private function returnInvalidJsonResponse(string $message)
    {
        $response = array(
            "code" => 500,
            'message' => $message,
        );

        return new JsonResponse($response);
    }
}