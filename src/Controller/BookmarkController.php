<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\BookMark;
use App\Entity\User;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/bookmark")
 */
class BookmarkController extends AbstractController
{
    private $em;
    private $userRepository;
    private $bookmarkRepository;
    private $logger;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->bookmarkRepository = $em->getRepository(BookMark::class);
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * @Route("/ajax-add-bookmark-to-article/{idArticle}", name= "bookmark_ajaxAddBookmarkToArticle", options = { "expose" = true })
     * @ParamConverter("article",options={"id" = "idArticle"})
     * @param Request $request
     * @return Response
     */
    public function ajaxAddBookmarkToArticle(Request $request, Article $article)
    {
        $userId = $request->request->get('visitorId');

        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        if (!empty($this->bookmarkRepository->findByArticleAndUser($article, $user))) {
            $this->returnInvalidJsonResponse('Can\'t add bookmark, since the User has already');
        }

        $bookmark = new BookMark();
        $bookmark->setUser($user);
        $bookmark->setArticle($article);
        $this->em->persist($bookmark);
        $this->em->flush();
        $response = [
            "code" => 200,
            'message' => "marque-page ajouté!",
            "isBookmarkedCurrentStatus" => true,
            "modifiedArticleId" => $article->getId()
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/ajax-remove-bookmark-from-article/{idArticle}", name="bookmark_ajaxRemoveBookmarkFromArticle", options = { "expose" = true })
     * @ParamConverter("article",options={"id" = "idArticle"})
     * @param Request $request
     * @return Response
     */
    public function ajaxRemoveBookmarkFromArticle(Request $request, Article $article)
    {
        $userId = $request->request->get('visitorId');
        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }
        $bookmarkToBeRemoved = $this->bookmarkRepository->findByArticleAndUser($article, $user);

        if (count($bookmarkToBeRemoved) == 0) {
            $this->returnInvalidJsonResponse('Can\'t remove bookmark from article since it couldn t be found in DB');
        }

        if (count($bookmarkToBeRemoved) > 1) {
            $this->logger->error("Two articles do exist for user id : " . $userId . " and article id = ." . $article->getId());
            $this->returnInvalidJsonResponse('Can\'t remove bookmark from article since it couldn t be found in DB');
        }

        dump($bookmarkToBeRemoved);
        $this->em->remove($bookmarkToBeRemoved[0]);
        $this->em->flush();

        $response = [
            "code" => 200,
            'message' => "bookmark supprimé!",
            "isBookmarkedCurrentStatus" => false,
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