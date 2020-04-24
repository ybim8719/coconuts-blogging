<?php


namespace App\Controller;


use App\Entity\EventSpecification;
use App\Entity\Follow;
use App\Entity\User;
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
 * @Route("/follow")
 */
class FollowController extends AbstractController
{
    private $em;
    private $userRepository;
    private $followRepository;
    private $logger;
    private $eventDispatcher;
    private $eventSpecificationRepository;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger, EventDispatcherInterface $dispatcher)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->followRepository = $em->getRepository(Follow::class);
        $this->eventSpecificationRepository = $em->getRepository(EventSpecification::class);
        $this->logger = $logger;
        $this->em = $em;
        $this->eventDispatcher = $dispatcher;
    }

    /**
     * @Route("/ajax-add-follow-to-writer/{idWriter}", name= "follow_ajaxAddFollowToWriter", options = { "expose" = true })
     * @ParamConverter("writer",options={"id" = "idWriter"})
     * @param Request $request
     * @return Response
     */
    public function ajaxAddFollowToWriter(Request $request, User $writer)
    {
        $userId = $request->request->get('visitorId');

        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        if (!empty($this->followRepository->findByUserAndWriter($user, $writer))) {
            $this->returnInvalidJsonResponse('Can\'t add follow, since the User has already');
        }

        $follow = new Follow();
        $follow->setFollower($user);
        $follow->setWriter($writer);
        $this->em->persist($follow);
        $this->em->flush();

        // build notifications
        $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::FOLLOW_A_WRITER]);
        $event = new CreateEventAndNotificationsEvent($user, $eventSpecification, $follow);
        $this->eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);

        $response = [
            "code" => 200,
            'message' => "abonnement ajouté!",
            "isFollowedCurrentStatus" => true
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/ajax-remove-follow-from-writer/{idWriter}", name="follow_ajaxRemoveFollowFromWriter", options = { "expose" = true })
     * @ParamConverter("writer",options={"id" = "idWriter"})
     * @param Request $request
     * @return Response
     */
    public function ajaxRemoveFollowFromWriter(Request $request, User $writer)
    {
        $userId = $request->request->get('visitorId');
        if (!is_int(intval($userId))) {
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }
        $followToBeRemoved = $this->followRepository->findByUserAndWriter($user, $writer);

        if (empty($followToBeRemoved)) {
            $this->returnInvalidJsonResponse('Can\'t remove follow from writer since it couldn t be found in DB');
        }

        if (count($followToBeRemoved) > 1) {
            $this->logger->error("Two follows do exist for user id : " . $userId . " and writer id = ." . $writer->getId());
            $this->returnInvalidJsonResponse('Can\'t remove follow from writer since it couldn t be found in DB');
        }

        $this->em->remove($followToBeRemoved[0]);
        $this->em->flush();

        $response = [
            "code" => 200,
            'message' => "abonnement supprimé!",
            "isFollowedCurrentStatus" => false
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