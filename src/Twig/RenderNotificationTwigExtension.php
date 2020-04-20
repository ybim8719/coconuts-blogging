<?php

namespace App\Twig;

use App\Entity\ChannelSubscription;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\EventSpecification;
use App\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class RenderNotificationTwigExtension extends AbstractExtension
{
    const CREATE_ARTICLE_EVENT_TEMPLATE = "notification/partials/article/create_article_event.html.twig";
    const CREATE_ARTICLE_ON_CHANNEL_EVENT_TEMPLATE = "notification/article/partials/create_article_on_channel_event.html.twig";
    const LIKE_AN_ARTICLE_EVENT_TEMPLATE = "notification/partials/article/like_an_article_event.html.twig";
    const LIKE_A_COMMENT_EVENT_TEMPLATE = "notification/partials/comment/like_a_comment_event.html.twig";
    const COMMENT_AN_ARTICLE_EVENT_TEMPLATE = "notification/partials/comment/comment_an_article_event.html.twig";
    const REMOVE_AN_ARTICLE_COMMENT_EVENT_TEMPLATE = "notification/partials/comment/remove_an_article_comment_event.html.twig";
    const COMMENT_A_COMMENT_OF_ARTICLE_EVENT_TEMPLATE = "notification/partials/comment/comment_a_comment_article_event.html.twig";
    const REMOVE_COMMENT_OF_COMMENT_OF_ARTICLE_EVENT_TEMPLATE = "notification/partials/comment/remove_comment_of_comment_article_event.html.twig";
    const SEND_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE = "notification/partials/csr/send_a_channel_subscription_request_event.html.twig";
    const ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE = "notification/partials/csr/accept_a_channel_subscription_request_event.html.twig";
    const REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE = "notification/partials/csr/refuse_a_channel_subscription_request_event.html.twig";
    const FOLLOW_A_WRITER_EVENT_TEMPLATE = "notification/partials/follow/follow_a_writer_event.html.twig";
    const REMOVE_CHANNEL_SUBSCRIPTION_BY_USER_EVENT_TEMPLATE = "notification/partials/channelSubscription/remove_channel_subscription_by_user.html.twig";
    const REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN_EVENT_TEMPLATE = "notification/partials/channelSubscription/remove_channel_subscription_by_admin.html.twig";

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

    public function renderNotification(Environment $environment, Notification $notification, bool $displayForChannelAdmin = false)
    {
        // checks the corresponding event related to notification to display.
        switch ($notification->getNotificationEvent()->getEventSpecification()->getStatusCode()) {
            case EventSpecification::PUBLISH_ARTICLE_CODE :
                $template = self::CREATE_ARTICLE_EVENT_TEMPLATE;
                break;
            case EventSpecification::PUBLISH_ARTICLE_ON_A_CHANNEL_CODE :
                $template = self::CREATE_ARTICLE_ON_CHANNEL_EVENT_TEMPLATE;
                break;
            case EventSpecification::LIKE_AN_ARTICLE :
                $template = self::LIKE_AN_ARTICLE_EVENT_TEMPLATE;
                break;
            case EventSpecification::LIKE_A_COMMENT :
                $template = self::LIKE_A_COMMENT_EVENT_TEMPLATE;
                break;
            case EventSpecification::COMMENT_AN_ARTICLE :
                $template = self::COMMENT_AN_ARTICLE_EVENT_TEMPLATE;
                break;
            case EventSpecification::REMOVE_AN_ARTICLE_COMMENT :
                $template = self::REMOVE_AN_ARTICLE_COMMENT_EVENT_TEMPLATE;
                break;
            case EventSpecification::COMMENT_A_COMMENT_OF_ARTICLE :
                $template = self::COMMENT_A_COMMENT_OF_ARTICLE_EVENT_TEMPLATE;
                break;
            case EventSpecification::REMOVE_A_COMMENT_OF_COMMENT_OF_ARTICLE :
                $template = self::REMOVE_COMMENT_OF_COMMENT_OF_ARTICLE_EVENT_TEMPLATE;
                break;
            case EventSpecification::SEND_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $template = self::SEND_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE;
                break;
            case EventSpecification::ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $template = self::ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE;
                break;
            case EventSpecification::REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $template = self::REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST_EVENT_TEMPLATE;
                break;
            case EventSpecification::FOLLOW_A_WRITER :
                $template = self::FOLLOW_A_WRITER_EVENT_TEMPLATE;
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER :
                $template = self::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER_EVENT_TEMPLATE;
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN :
                $template = self::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN_EVENT_TEMPLATE;
                break;
            default:
                return "";
        }

        // two types of templates are possibles for regular members and for admin, this boolean holds this information.
        return $environment->render($template, [
            'event' => $notification->getNotificationEvent(),
            'displayForChannelAdmin' => $displayForChannelAdmin
        ]);
    }
}