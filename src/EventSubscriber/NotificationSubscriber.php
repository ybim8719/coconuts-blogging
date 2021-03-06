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
        $this->em->getFilters()->disable('softdeleteable'); // we also retrive softDeleted entities for example for cases of comment removal
        $notificationEvent = new NotificationEvent();
        $eventSpecification = $event->getEventSpecification();
        $notificationEvent->setEventAuthor($event->getEventAuthor())->setEventSpecification($eventSpecification);

        // switch all possibles cases of specificationEvent that trigger the sending of notifications
        switch($eventSpecification->getStatusCode()) {
            case  EventSpecification::PUBLISH_ARTICLE_CODE :
                $notificationEvent->setArticle($event->getArticle());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de publier un article : ".$event->getArticle()->getTitle());
                $this->createNotificationForPublishArticleEvent($notificationEvent);
                break;
            case  EventSpecification::PUBLISH_ARTICLE_ON_A_CHANNEL_CODE :
                $notificationEvent->setArticle($event->getArticle());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de publier un article : ".$event->getArticle()->getTitle());
                $this->createNotificationForPublishArticleOnChannelEvent($notificationEvent);
                break;
            case EventSpecification::LIKE_AN_ARTICLE :
                $notificationEvent->setArticle($event->getArticle());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de liker l'article : ".$event->getArticle()->getTitle());
                $this->createNotificationForLikeArticleEvent($notificationEvent);
                break;
            case EventSpecification::COMMENT_AN_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de commenter l'article : ".$event->getComment()->getArticle()->getTitle());
                $this->createNotificationForCommentArticleEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_AN_ARTICLE_COMMENT:
                $notificationEvent->setComment($event->getComment());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de supprimer le commentaire : ".substr($event->getComment()->getContent(), 0, 30). "...");
                $this->createNotificationForCommentArticleRemovalEvent($notificationEvent);
                break;
            case EventSpecification::LIKE_A_COMMENT :
                $notificationEvent->setComment($event->getComment());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de liker le commentaire : ".substr($event->getComment()->getContent(), 0, 30). "...");
                $this->createNotificationForLikeOfACommentEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_A_COMMENT_OF_COMMENT_OF_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de supprimer le commentaire : ".substr($event->getComment()->getContent(), 0, 30). "...");
                $this->createNotificationForCommentOfCommentRemovalEvent($notificationEvent);
                break;
            case EventSpecification::COMMENT_A_COMMENT_OF_ARTICLE :
                $notificationEvent->setComment($event->getComment());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de publier le commentaire : ".substr($event->getComment()->getContent(), 0, 30). "...");
                $this->createNotificationForCommentOfCommentEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER :
                $notificationEvent->setChannelSubscription($event->getChannelSubscription());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de se désabonner du channel : ". $event->getChannelSubscription()->getChannel()->getTitle());
                $this->createNotificationForChannelSubscriptionRemovalByUserEvent($notificationEvent);
                break;
            case EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN :
                $notificationEvent->setChannelSubscription($event->getChannelSubscription());

                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de désabonner " . $event->getChannelSubscription()->getUser()->getUsername() . " du channel : ". $event->getChannelSubscription()->getChannel()->getTitle());
                $this->createNotificationForChannelSubscriptionRemovalByAdminEvent($notificationEvent);
                break;
            case EventSpecification::FOLLOW_A_WRITER :
                $notificationEvent->setFollow($event->getFollow());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de s'abonner à l'activité de  " . $event->getFollow()->getWriter()->getUsername());
                $this->createNotificationForFollowWriterEvent($notificationEvent);
                break;
            case EventSpecification::SEND_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                dump($event);
                dump($event->getChannelSubscriptionRequest());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de vous envoyer une demande pour rejoindre " . $event->getChannelSubscriptionRequest()->getChannel()->getTitle());
                $this->createNotificationForSendOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            case EventSpecification::ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient d'accepter votre  demande de souscription à  " . $event->getChannelSubscriptionRequest()->getChannel()->getTitle());
                $this->createNotificationForAcceptanceOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            case EventSpecification::REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST :
                $notificationEvent->setChannelSubscriptionRequest($event->getChannelSubscriptionRequest());
                $notificationEvent->setContent($event->getEventAuthor()->getUsername()." vient de refuser votre  demande de souscription à  " . $event->getChannelSubscriptionRequest()->getChannel()->getTitle());
                $this->createNotificationForRefusalOfChannelSubscriptionRequestEvent($notificationEvent);
                break;
            default:
                return;
        }

        $this->em->persist($notificationEvent);
        $this->em->flush();
    }

    /**
     * generate notifications after publication of an Article => inform the followers of the writer
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForPublishArticleEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        // @todo a future repo method would be more efficient
        foreach($notificationEvent->getArticle()->getUser()->getIncomingFollows() as $follow) {
            $recipients[] = $follow->getFollower();
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }


    /**
     * generate notifications after publication of an Article On a channel=> inform the followers of the writer + the subscribers of the channel
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForPublishArticleOnChannelEvent(NotificationEvent $notificationEvent)
    {
        // @todo a future repo method would be more efficient
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        foreach($notificationEvent->getArticle()->getUser()->getIncomingFollows() as $follow) {
            $recipients[] = $follow->getFollower();
        }

        foreach($notificationEvent->getArticle()->getChannel()->getChannelSubscriptions() as $channelSubscription) {
            if (!in_array($channelSubscription->getUser(), $recipients)) {
                $recipients[] = $channelSubscription->getUser();
            }
        }

        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications after like of an Article => inform the writer of the article
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForLikeArticleEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        $recipients[] = $notificationEvent->getArticle()->getUser();
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications after publication of new comment on an Article => inform the writer of the article and those who already commented on the same article
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForCommentArticleEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        if (!in_array($notificationEvent->getComment()->getArticle()->getUser(), $recipients)) {
            $recipients[] = $notificationEvent->getComment()->getArticle()->getUser();
        }

        foreach($notificationEvent->getComment()->getArticle()->getComments() as $comment) {
            if (!in_array($comment->getAuthor(), $recipients)) {
                $recipients[] = $comment->getAuthor();
            }
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications after  removal of comment on an Article by the admin => inform the writer of the comment
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForCommentArticleRemovalEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getComment()->getAuthor();
        if (!in_array($notificationEvent->getEventAuthor(), $recipients)) {
            $recipients[] = $notificationEvent->getEventAuthor();
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications after  new like of a comment on an Article => inform the writer of the comment
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForLikeOfACommentEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        if (!in_array($notificationEvent->getEventAuthor(), $recipients)) {
            $recipients[] = $notificationEvent->getComment()->getAuthor();
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * @TODO le renseigner plus tard quand le comment of comment existera
     * generate notifications after  removal of comment of comment on an Article by the admin => inform the writer of the comment  and the writer of the article
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForCommentOfCommentRemovalEvent(NotificationEvent $notificationEvent)
    {
    }

    /**
     * @TODO le renseigner plus tard quand le comment of comment existera
     *
     * generate notifications when a new comment of comment on an Article is added => inform the writer of the initial comment and the writer of the article
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForCommentOfCommentEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
    }

    /**
     * generate notifications when a CS is removed by a user  => inform the admins of the channel
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForChannelSubscriptionRemovalByUserEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        foreach ($notificationEvent->getChannelSubscription()->getChannel()->getAdminUsers() as $adminUser) {
            if (!in_array($adminUser, $recipients)) {
                $recipients[] = $adminUser;
            }
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications when a CS is removed by an admin  => inform the admins of the channel and the user
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForChannelSubscriptionRemovalByAdminEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        $recipients[] = $notificationEvent->getChannelSubscription()->getUser();
        foreach ($notificationEvent->getChannelSubscription()->getChannel()->getAdminUsers() as $adminUser) {
            if (!in_array($adminUser, $recipients)) {
                $recipients[] = $adminUser;
            }
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications when a user follows a writer => informs the writer
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForFollowWriterEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        $recipients[] = $notificationEvent->getFollow()->getWriter();
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications when a user send a CSR => informs the admins of the channel
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForSendOfChannelSubscriptionRequestEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getEventAuthor();
        foreach ($notificationEvent->getChannelSubscriptionRequest()->getChannel()->getAdminUsers() as $adminUser) {
            if (!in_array($adminUser, $recipients)) {
                $recipients[] = $adminUser;
            }
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications when ad admin accepts a CSR => informs the admins of the channel and the user
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForAcceptanceOfChannelSubscriptionRequestEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getChannelSubscriptionRequest()->getApplicant();
        foreach ($notificationEvent->getChannelSubscriptionRequest()->getChannel()->getAdminUsers() as $adminUser) {
                $recipients[] = $adminUser;
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    /**
     * generate notifications when ad admin refuses a CSR => informs the admins of the channel and the user
     *
     * @param NotificationEvent $notificationEvent
     */
    private function createNotificationForRefusalOfChannelSubscriptionRequestEvent(NotificationEvent $notificationEvent)
    {
        $recipients = [];
        $recipients[] = $notificationEvent->getChannelSubscriptionRequest()->getApplicant();
        foreach ($notificationEvent->getChannelSubscriptionRequest()->getChannel()->getAdminUsers() as $adminUser) {
            $recipients[] = $adminUser;
        }
        $this->createNotificationForArrayOfUser($recipients, $notificationEvent);
    }

    private function createNotificationForArrayOfUser(array $arrayOfUsers, NotificationEvent $notificationEvent)
    {
        foreach ($arrayOfUsers as $recipient) {
            if ($recipient instanceof User) {
                $this->createNotification($recipient, $notificationEvent);
            }
        }
    }

    private function createNotification(User $recipient, NotificationEvent $notificationEvent)
    {
        $notification = new Notification();
        $notification->setRecipient($recipient)->setNotificationEvent($notificationEvent);
        $this->em->persist($notification);
    }
}