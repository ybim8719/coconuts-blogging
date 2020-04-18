<?php

namespace App\EventSubscriber;


use App\Entity\EventSpecification;
use App\Entity\Notification;
use App\Entity\NotificationEvent;
use App\Entity\User;
use App\Event\CreateEventAndNotificationsEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class NotificationSubscriber implements EventSubscriberInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return [
            CreateEventAndNotificationsEvent::REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER => [
                ['createEventAndNotifications', 0],
            ]
        ];
    }

    public function createEventAndNotifications(CreateEventAndNotificationsEvent $event)
    {
        $notificationEvent = new NotificationEvent();
        $eventSpecification = $event->getEventSpecification();
        $notificationEvent->setTriggerUser($event->getTriggerUser())->setEventSpecification($eventSpecification);

        switch($eventSpecification->getStatusCode()) {
            case  EventSpecification::PUBLISH_ARTICLE_CODE :
                $notificationEvent->setArticle($event->getArticle());
                $this->createNotificationForPublishArticleEvent($notificationEvent);
                break;
            case  EventSpecification::PUBLISH_ARTICLE_ON_A_CHANNEL_CODE :
                $notificationEvent->setArticle($event->getArticle());
                $this->createNotificationForPublishArticleOnChannelEvent($notificationEvent);
                break;
            case EventSpecification::LIKE_AN_ARTICLE :
                $notificationEvent->setArticle($event->getArticle());
                $this->createNotificationForLikeArticleEvent($notificationEvent);
                break;
            case EventSpecification::COMMENT_AN_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $this->createNotificationForCommentArticleEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_AN_ARTICLE_COMMENT:
                $notificationEvent->setComment($event->getComment());
                $this->createNotificationForCommentArticleRemovalEvent($notificationEvent);
                break;
            case EventSpecification::LIKE_A_COMMENT :
                $notificationEvent->setComment($event->getComment());
                $this->createNotificationForLikeOfAnArticleEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_A_COMMENT_OF_COMMENT_OF_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $this->createNotificationForCommentOfCommentRemovalEvent($notificationEvent);
                break;
            case EventSpecification::COMMENT_A_COMMENT_OF_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $this->createNotificationForCommentOfCommentEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER :
                $notificationEvent->setChannelSubscription($event->getChannelSubscription());
                $this->createNotificationForChannelSubscriptionByUserEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN :
                $notificationEvent->setChannelSubscription($event->getChannelSubscription());
                $this->createNotificationForChannelSubscriptionByAdminEvent($notificationEvent);
                break;
            case EventSpecification::FOLLOW_A_WRITER :
                $notificationEvent->setFollow($event->getFollow());
                $this->createNotificationForFollowWriterEvent($notificationEvent);
                break;
            case EventSpecification::SEND_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                $this->createNotificationForSendOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            case EventSpecification::ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                $this->createNotificationForAcceptanceOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            case EventSpecification::REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                $this->createNotificationForRefursalOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            default:
                return;
        }

        $this->em->persist($notificationEvent);
    }

    /**
     * generate notifications after publication of an Article => inform the followers of the writer
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForPublishArticleEvent(NotificationEvent $notificationEvent)
    {
        $followers = [];

        // @todo a future repo method would be more efficient
        foreach($notificationEvent->getArticle()->getUser()->getIncomingFollows() as $follow) {
            $followers[] = $follow->getFollower();
        }

        foreach ($followers as $follower) {
            $this->createNotification($follower, $notificationEvent);
        }
    }


    /**
     * generate notifications after publication of an Article On a channel=> inform the followers of the writer + the subscribers of the channel
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForPublishArticleOnChannelEvent(NotificationEvent $notificationEvent)
    {

    }

    public function createNotificationForLikeArticleEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForCommentArticleEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForCommentArticleRemovalEvent(NotificationEvent $event)
    {

    }
    public function createNotificationForLikeOfAnArticleEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForCommentOfCommentRemovalEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForCommentOfCommentEvent(NotificationEvent $event)
    {

    }


    public function createNotificationForChannelSubscriptionByUserEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForChannelSubscriptionByAdminEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForFollowWriterEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForSendOfChannelSubscriptionRequestEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForAcceptanceOfChannelSubscriptionRequestEvent(NotificationEvent $event)
    {

    }

    public function createNotificationForRefursalOfChannelSubscriptionRequestEvent(NotificationEvent $event)
    {

    }



    private function createNotification(User $recipient, NotificationEvent $notificationEvent)
    {
        $notification = new Notification();
        $notification->setRecipient($recipient)->setNotificationEvent($notificationEvent);
        $this->em->persist($notification);
    }

}
