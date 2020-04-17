<?php


namespace App\Controller;
use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\User;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    private $logger;
    private $mailer;
    private $message;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger, \Swift_Mailer $mailer)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelSubscriptionRepository = $em->getRepository(ChannelSubscription::class);
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
    public function ajaxRemoveChannelSubscription(Request $request, Channel $channel)
    {
        $visitorId = $request->request->get('visitorId');
        $userId = $request->request->get('userId');
        $user = $this->userRepository->find($userId);
        $visitor= $this->userRepository->find($visitorId);

        if (!$user instanceof User || !$visitor instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given id ');
        }

        // vérifie que le mec a les droits admin
        $channelSubscription =$this->channelSubscriptionRepository->findByChannelAndUser($channel, $visitor );
        if (empty($channelSubscription) ||  $channelSubscription[0]->getIsAdmin() == false) {
            $this->logger->error("Suppression c'un channel subscription impossible, car le visiteur id=".$visitor->getId()." de ce channel id =.".$channel->getId(). "n'est pas admin");
            $this->returnInvalidJsonResponse("Suppression impossible. le visitor n'est pas admin");

        }

        $channelSubscriptions =$this->channelSubscriptionRepository->findByChannelAndUser($channel, $user );
        if (!empty($channelSubscription)) {
            $this->logger->error("Suppression c'un channel subscription impossible, car pas d'inscription retrouvée en base pour cette personne avec id =".$user->getId()." et ce channel id =.".$channel->getId());
            $this->returnInvalidJsonResponse("Pas d'inscription retrouvée en base pour cette personne et ce channel. Suppression impossible");
        }

        foreach($channelSubscriptions as $subscription ) {
            $this->em->remove($subscription);
        }

        $this->em->flush();

        //@todo Ajouter un event listener pour la création de notification

        $mailToSend = $this->message->setSubject('Votre inscription au channel  '. $channel->getTitle(). " a été supprimée");
        //$this->sendEmail($mailToSend, $user, $channel->getTitle(), self::REMOVE_SUBSCRIPTION_TEMPLATE_PATH_USER);

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