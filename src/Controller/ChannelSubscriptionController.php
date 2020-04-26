<?php


namespace App\Controller;
use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\EventSpecification;
use App\Entity\User;
use App\Event\CreateEventAndNotificationsEvent;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChannelSubscriptionController extends AbstractController
{
    const REMOVE_SUBSCRIPTION_TEMPLATE_PATH_ADMIN = 'email/remove_channel_subscription_admin.html.twig';
    const REMOVE_SUBSCRIPTION_TEMPLATE_PATH_USER = 'email/remove_channel_subscription_user.html.twig';

    private $em;
    private $userRepository;
    private $channelSubscriptionRepository;
    private $eventSpecificationRepository;
    private $logger;
    private $mailer;
    private $message;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger, \Swift_Mailer $mailer)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelSubscriptionRepository = $em->getRepository(ChannelSubscription::class);
        $this->eventSpecificationRepository = $em->getRepository(EventSpecification::class);
        $this->logger = $logger;
        $this->em = $em;
        $this->mailer = $mailer;
        $this->message = new\ Swift_Message();
        $this->message->setFrom('coconutsblogging@gmail.com');
    }

    /**
     * @Route("/ajax-remove-channel-subscription/{idChannel}", name= "channelSubscription_ajaxRemoveChannelSubscription", options = { "expose" = true })
     * @ParamConverter("channel",options={"id" = "idChannel"})
     * @param Request $request
     * @return Response
     */
    public function ajaxRemoveChannelSubscription(Request $request, Channel $channel, EventDispatcher $eventDispatcher)
    {
        $visitorId = $request->request->get('visitorId');
        $userId = $request->request->get('userId');
        $user = $this->userRepository->find($userId);
        $visitor= $this->userRepository->find($visitorId);
        $visitorIsAdmin = false;

        if (!$user instanceof User || !$visitor instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given id ');
        }

        $channelSubscriptions =$this->channelSubscriptionRepository->findByChannelAndUser($channel, $visitor);

        if (empty($channelSubscriptions)) {
            $this->logger->error("Suppression c'un channel subscription impossible car l'inscirption n'a pas été retrouvée");
            $this->returnInvalidJsonResponse("Suppression c'un channel subscription impossible car l'inscirption n'a pas été retrouvée");
        }

        // vérifie que le mec a les droits admin
        if ($channelSubscriptions[0]->getIsAdmin() == false) {
            if ($userId->getId() != $visitor->getId()) {
                $this->logger->error("Suppression c'un channel subscription impossible, car le visiteur id=".$visitor->getId()." de ce channel id =.".$channel->getId(). "n'est pas admin");
                $this->returnInvalidJsonResponse("Suppression impossible. le visitor n'est pas admin");
            }
        }
        else {
            $visitorIsAdmin = true;
        }

        foreach($channelSubscriptions as $subscription ) {
            $this->em->remove($subscription);
        }
        $this->em->flush();

        if ($visitorIsAdmin) {
            $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN]);
        } else {
            $eventSpecification = $this->eventSpecificationRepository->findOneBy(['statusCode' => EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER]);
        }

        $event = new CreateEventAndNotificationsEvent($user, $eventSpecification, $channelSubscriptions[0]);
        $eventDispatcher->dispatch($event, CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER);

        $mailToSend = $this->message->setSubject('Votre inscription au channel  '. $channel->getTitle(). " a été supprimée");
        $this->sendEmail($mailToSend, $user, $channel->getTitle(), self::REMOVE_SUBSCRIPTION_TEMPLATE_PATH_USER);

        $mailToSend = $this->message->setSubject('L\'inscription au channel  '. $channel->getTitle(). " de ".$user->getUsername()." a été supprimée");

        foreach ($channel->getAdminUsers() as $admin) {
            $this->sendEmail($mailToSend, $admin, $channel->getTitle(),self::REMOVE_SUBSCRIPTION_TEMPLATE_PATH_ADMIN, $visitor->getUsername(), $user->getUsername());
        }

        $response = [
            "code" => 200,
            'message' => "La demande a été envoyée aux administrateurs",
            "idUser" => $user->getId(),
        ];
        return new JsonResponse($response);
    }

    private function sendEmail(\Swift_Message $message, User $recipient, string $channelTitle, string $template, string $adminUsername = null, string $subscriberName = null)
    {
        $message
            ->setTo($recipient->getEmail())
            ->setBody(
                $this->renderView(
                    $template, [
                        'channelTitle' => $channelTitle,
                        'recipientName' => $recipient->getUsername(),
                        'embedImage' =>$message->embed(\Swift_Image::fromPath('http://127.0.0.1:8000/images/1189284034_small.jpg')),
                        'adminUsername' =>$adminUsername,
                        'userName' =>$subscriberName,
                    ]
                ), 'text/html'
            );
        $this->mailer->send($message);
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