<?php


namespace App\Controller;


use App\Entity\Channel;
use App\Entity\ChannelSubscription;
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
    const INCOMING_REQUEST_TEMPLATE_PATH = 'email/channel_subscription_request.html.twig';
    const OUTCOMING_ACCEPTANCE_RESPONSE_TEMPLATE_PATH_ADMIN = 'email/channel_subscription_acceptance_admin.html.twig';
    const OUTCOMING_REFUSAL_RESPONSE_TEMPLATE_PATH_ADMIN = 'email/channel_subscription_refusal_admin.html.twig';
    const OUTCOMING_REFUSAL_RESPONSE_TEMPLATE_PATH_APPLICANT = 'email/channel_subscription_refusal_applicant.html.twig';

    private $em;
    private $userRepository;
    private $channelRepository;
    private $channelSubscriptionRequestRepository;
    private $channelSubscriptionRepository;
    private $logger;
    private $mailer;
    private $message;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger, \Swift_Mailer $mailer)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelRepository = $em->getRepository(Channel::class);
        $this->channelSubscriptionRequestRepository = $em->getRepository(ChannelSubscriptionRequest::class);
        $this->channelSubscriptionRepository = $em->getRepository(ChannelSubscription::class);
        $this->logger = $logger;
        $this->em = $em;
        $this->mailer = $mailer;
        $this->message = new\ Swift_Message();
        $this->message->setFrom('coconutsblogging@gmail.com');
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

        $mailToSend = $this->message->setSubject('Vous avez reçu une demande d\'inscription pour le channel '. $channel->getTitle());
        foreach ($channel->getAdminUsers() as $admin) {
            $this->sendEmail($mailToSend, $admin, $channel->getTitle(), $user, self::INCOMING_REQUEST_TEMPLATE_PATH);
        }

        $response = [
            "code" => 200,
            'message' => "La demande a été envoyée aux administrateurs",
            "channelId" => $channel->getId(),
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/ajax-accept-channel-subscription-request/{idRequest}", name= "channelSubscriptionRequest_ajaxAcceptChannelSubscriptionRequest", options = { "expose" = true })
     * @ParamConverter("channelSubscriptionRequest",options={"id" = "idRequest"})
     * @param Request $request
     * @return Response
     */
    public function ajaxAcceptChannelSubscriptionRequest(Request $request, ChannelSubscriptionRequest $channelSubscriptionRequest)
    {
        $userId = $request->request->get('visitorId');
        $status = $request->request->get('statusLabel');
        $channel = $channelSubscriptionRequest->getChannel();

        if (!is_int(intval($userId))) {
            $this->logger->warning('no id found for visitor, acceptance is cancelled');
            $this->returnInvalidJsonResponse('no visitor Id given');
        }

        $user = $this->userRepository->find($userId);
        if (!$user instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        // check if user has the rights
        if ($this->channelSubscriptionRepository->findByUserChannelAndStatus($user, $channel, true)) {
            $this->returnInvalidJsonResponse("Le visitor n'a pas les droits pour accepter une demande sur ce channel.");
        }

        if ($status == "label-accept") {
            if ($channelSubscriptionRequest->getStatus() != ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_PENDING) {
                $this->returnInvalidJsonResponse("les statuts de la demande et l'id du bouton ne matchent pas.");
            }
        }

        if ($status == "label-accept-anyway") {
            if ($channelSubscriptionRequest->getStatus() != ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_REFUSED) {
                $this->returnInvalidJsonResponse("les statuts de la demande et l'id du bouton ne matchent pas.");
            }
        }

        $applicant = $channelSubscriptionRequest->getApplicant();
        $channelSubscriptionRequest->setStatus(ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_ACCEPTED);

        if (empty($this->channelSubscriptionRepository->findByChannelAndUser($channel, $applicant))) {
            $channelSubscription = new ChannelSubscription();
            $channelSubscription
                ->setChannel($channel)
                ->setIsAdmin(false)
                ->setUser($applicant);
            $this->em->persist($channelSubscription);
        }
        $this->em->flush();

        //@todo Ajouter un event listener pour informer de l'acceptation de la demande pour  le demandeur et les autres admins

        $mailToSend =  $this->message->setSubject(' une demande d\'inscription pour le channel '. $channel->getTitle());
        foreach ($channel->getAdminUsers() as $admin) {
            $this->sendEmail( $mailToSend, $admin, $channel->getTitle(), $applicant, self::OUTCOMING_ACCEPTANCE_RESPONSE_TEMPLATE_PATH_ADMIN, $user->getUsername());
        }

        $response = [
            "code" => 200,
            'message' => "Votre demande a été envoyée aux administateurs de la chaîne, vous recevrez une réponse sous peu.",
            "requestId" => $channelSubscriptionRequest->getId(),
            "statusLabel" => $status
        ];

        return new JsonResponse($response);
    }

    /**
    * @Route("/ajax-refuse-channel-subscription-request/{idRequest}", name= "channelSubscriptionRequest_ajaxRefuseChannelSubscriptionRequest", options = { "expose" = true })
    * @ParamConverter("channelSubscriptionRequest",options={"id" = "idRequest"})
     * @param Request $request
    * @return Response
     */
    public function channelSubscriptionRequest_ajaxRefuseChannelSubscriptionRequest(Request $request, ChannelSubscriptionRequest $channelSubscriptionRequest)
    {
        $userId = $request->request->get('visitorId');
        $channel = $channelSubscriptionRequest->getChannel();
        $visitor = $this->userRepository->find($userId);

        if (!$visitor instanceof User) {
            $this->returnInvalidJsonResponse('Can\'t find User with given visitorId ');
        }

        // check if user has the rights
        if ($this->channelSubscriptionRepository->findByUserChannelAndStatus($visitor, $channel, true)) {
            $this->returnInvalidJsonResponse("Le visitor n'a pas les droits pour accepter une demande sur ce channel.");
        }

        // check if the action of refusal does REALLY involves a PENDING request
        if ($channelSubscriptionRequest->getStatus() != ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_PENDING) {
            $this->returnInvalidJsonResponse("les statuts de la demande et l'id du bouton ne matchent pas.");
        }

        $applicant = $channelSubscriptionRequest->getApplicant();

        //on change le statut de la demande à refusée
        $channelSubscriptionRequest->setStatus(ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_REFUSED);

        //on remove les subscriptions INCOHERENTES du mec en base si jamais elles existent
        if (!empty($this->channelSubscriptionRepository->findByChannelAndUser($channel, $applicant))) {
            foreach($this->channelSubscriptionRepository->findByChannelAndUser($channel, $applicant) as $channelSubscription)
                $this->em->remove($channelSubscription);
        }

        $this->em->flush();

        //@todo Ajouter un event listener pour informer le refus de la demande pour le demandeur et les autres admins

        $mailToSend =  $this->message->setSubject(' Demande refusée pour le channel'. $channel->getTitle());
        // send email to the admins of channel
        foreach ($channel->getAdminUsers() as $admin) {
            $this->sendEmail( $mailToSend, $admin, $channel->getTitle(), $applicant, self::OUTCOMING_REFUSAL_RESPONSE_TEMPLATE_PATH_ADMIN, $visitor->getUsername());
        }
        // send email to the applicant
        $this->sendEmail( $mailToSend, $applicant, $channel->getTitle(), $applicant, self::OUTCOMING_REFUSAL_RESPONSE_TEMPLATE_PATH_APPLICANT);

        $response = [
            "code" => 200,
            'message' => "Refusé pris en compte, les protagonistes ont été informés.",
            "requestId" => $channelSubscriptionRequest->getId(),
        ];

        return new JsonResponse($response);
    }

    private function sendEmail(\Swift_Message $message, User $recipient, string $channelTitle, User $applicant, string $template, string $adminUsername = null)
    {
        $message
            ->setTo($recipient->getEmail())
            ->setBody(
                $this->renderView(
                    $template, [
                        'channelTitle' => $channelTitle,
                        'recipientName' => $recipient->getUsername(),
                        'applicantName' => $applicant->getUsername(),
                        'applicantId' => $applicant->getId(),
                        'embedImage' =>$message->embed(\Swift_Image::fromPath('http://127.0.0.1:8000/images/1189284034_small.jpg')),
                        'adminUsername' =>$adminUsername
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