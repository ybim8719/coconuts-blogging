<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\Channel;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\User;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChannelSubscriptionRequestController extends AbstractController
{
    private $em;
    private $userRepository;
    private $channelRepository;
    private $channelSubscriptionRequestRepository;
    private $logger;
    private $mailer;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger, \Swift_Mailer $mailer)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelRepository = $em->getRepository(Channel::class);
        $this->channelSubscriptionRequestRepository = $em->getRepository(ChannelSubscriptionRequest::class);
        $this->logger = $logger;
        $this->em = $em;
        $this->mailer = $mailer;
    }

    /**
     * @Route("/ajax-save-channel-subscription-request/{idChannel}", name= "channelSubscriptionRequest_ajaxSaveChannelSubscriptionRequest", options = { "expose" = true })
     * @ParamConverter("channel",options={"id" = "idChannel"})
     * @param Request $request
     * @return Response
     */
    public function ajaxSaveChannelSubscriptionRequest(Request $request, Channel $channel)
    {
        $userId = $request->request->get('visitorId');
        if (!is_int(intval($userId))) {
            $this->logger->warning('request for channel subscription ajax did not receive correct applicant id');
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);
        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        if (!empty($this->channelSubscriptionRequestRepository->findByChannelAndUser($channel, $user ))) {
            $response = [
                "code" => 500,
                'message' => "Impossible de faire la demande, il y en a déjà une en base.",
            ];
        }

        $channelSubscriptionRequest = new ChannelSubscriptionRequest();
        $channelSubscriptionRequest->setApplicant($user)->setChannel($channel)->setStatus(ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_PENDING);
        $this->em->persist($channelSubscriptionRequest);
        $this->em->flush();

        //@todo Ajouter un event listener pour la création de notification pour chaque destinataire du mail
        foreach ($channel->getAdminUsers() as $admin) {
            /**
             * @var $admin User
             */
            $title = 'Vous avez reçu une demande d\'inscription pour le channel '. $channel->getTitle();

            $message = (new \Swift_Message($title));
            $message
                ->setFrom('coconutsblogging@gmail.com')
                ->setTo($admin->getEmail())
                ->setBody(
                    $this->renderView(
                    'email/channel_subscription_request.html.twig', [
                        'channelTitle' => $channel->getTitle(),
                        'username' => $admin->getUsername(),
                        'applicantUsername' => $user->getUsername(),
                        'applicantId' => $user->getId(),
                        'embedImage' =>$message->embed(\Swift_Image::fromPath('http://127.0.0.1:8000/images/1189284034_small.jpg'))
                        ]
                    ), 'text/html'
                );
            $this->mailer->send($message);
        }

        $response = [
            "code" => 200,
            'message' => "La demande a été envoyée aux administrateurs",
            "channelId" => $channel->getId(),
        ];

        return new JsonResponse($response);
    }
}