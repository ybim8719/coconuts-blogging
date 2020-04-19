<?php


namespace App\Twig;


use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\EventSpecification;
use App\Entity\Notification;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class RenderNotificationTwigExtension extends AbstractExtension
{
    const CREATE_ARTICLE_EVENT_TEMPLATE = "notification/partials/create_article_event.html.twig";
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected $channelSubscriptionsRepository;
    protected $channelSubscriptionsRequestRepository;

    /**
     * RenderInvoiceTwigExtension constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->channelSubscriptionsRepository = $em->getRepository(ChannelSubscription::class);
        $this->channelSubscriptionsRequestRepository = $em->getRepository(ChannelSubscriptionRequest::class);
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('render_notification', [$this, 'renderNotification'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
        ];
    }

    public function renderNotification(Environment $environment, Notification $notification)
    {
        switch ($notification->getNotificationEvent()->getEventSpecification()->getStatusCode()) {
            case EventSpecification::PUBLISH_ARTICLE_CODE :
                $template = self::CREATE_ARTICLE_EVENT_TEMPLATE;
                break;
            default:
                return "";
        }

        return $environment->render($template, [
            'event' => $notification->getNotificationEvent(),
        ]);
    }
}