<?php


namespace App\Controller;

use App\Entity\Notification;
use App\Entity\User;
use App\Repository\ArticleRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/notification")
 */
class NotificationController extends  AbstractController
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
    private $notificationRepository;

    private $logger;



    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->notificationRepository = $em->getRepository(Notification::class);
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * @Route("/display-notifications-of-user/{idUser}", name="notification_displayNotificationsOfUser", methods={"GET"})
     * @ParamConverter("user",options={"id" = "idUser"})
     */
    public function displayNotificationsOfUser(User $user)
    {
        if (!$this->getUser() instanceof User) {
            throw new \Exception("can't access page without being logged" );
        }

        if ($this->getUser()->getId() != $user->getId() && !$this->getUser()->getIsAdmin()) {
            throw new \Exception("visitor has not rights to access this private page" );
        }

        $notifications = [];
        $notifications['wasRed'] = $this->notificationRepository->findNotificationsByUserAndWasRedStatus($this->getUser(), true);
        $notifications['wasNotRed'] = $this->notificationRepository->findNotificationsByUserAndWasRedStatus($this->getUser(), false);
        return $this->render('notification/display_notification_of_user.html.twig', [
            'notifications' => $notifications,
            'userId' => $user->getId()
        ]);
    }


    /**
     * @Route("/ajax-remove-unread-from-notifications/{idUser}", name= "notification_ajaxRemoveUnreadFromNotificationForUser", options = { "expose" = true })
     * @ParamConverter("user",options={"id" = "idUser"})
     */
    public function ajaxRemoveUnreadFromNotificationForUser(Request $request, User $user)
    {
        $visitorId = $request->request->get('visitorId');
        $arrayOfIds = $request->request->get('arrayOfIds');

        if (!is_int(intval($visitorId))) {
            $this->logger->warning('request for channel subscription ajax did not receive correct applicant id');
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $visitor = $this->userRepository->find($visitorId);
        if (!$visitor instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find Visitor with given visitorId ');
        }

        if ($visitor->getId() != $user->getId() && !$visitor->getIsAdmin()) {
            $this->returnInvalidJsonResponse("visitor has not rights to modifiy content of the page");
        }

        foreach($arrayOfIds as $id) {
            if (!empty($this->notificationRepository->findOneBy(['id' => $id]))) {
                $notification = $this->notificationRepository->find($id);
                $notification->setWasRead(true);
            }
        }
        $this->em->flush();

        $response = [
            "code" => 200,
            'message' => "Les nouveaux messages seront considérés comme non lus au prochain affichage ",
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