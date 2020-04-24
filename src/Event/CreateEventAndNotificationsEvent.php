<?php

namespace App\Event;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\ChannelSubscription;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\EventSpecification;
use App\Entity\Follow;
use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;


class CreateEventAndNotificationsEvent extends Event
{
    const REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER = "REGISTER_NOTIFICATION_EVENT_FOR_SUBSCRIBER";

    private $eventAuthor;
    private $eventSpecification;
    private $article;
    private $comment;
    private $follow;
    private $channelSubscription;
    private $channelSubscriptionRequest;

    public function __construct(User $user, EventSpecification $eventSpecification, $entityObject)
    {
        $this->eventAuthor = $user;
        $this->eventSpecification = $eventSpecification;
        switch ($eventSpecification->getStatusCode()) {
            case
                EventSpecification::PUBLISH_ARTICLE_CODE ||
                EventSpecification::PUBLISH_ARTICLE_ON_A_CHANNEL_CODE ||
                EventSpecification::LIKE_AN_ARTICLE :
                if ($entityObject instanceof Article) {
                    $this->article = $entityObject;
                }
                break;
            case
                EventSpecification::COMMENT_AN_ARTICLE ||
                EventSpecification::REMOVE_AN_ARTICLE_COMMENT ||
                EventSpecification::LIKE_A_COMMENT ||
                EventSpecification::REMOVE_A_COMMENT_OF_COMMENT_OF_ARTICLE ||
                EventSpecification::COMMENT_A_COMMENT_OF_ARTICLE :
                if ($entityObject instanceof ArticleComment) {
                    $this->comment = $entityObject;
                }
                break;
            case
                EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_USER ||
                EventSpecification::REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN :
                if ($entityObject instanceof ChannelSubscription) {
                    $this->channelSubscription = $entityObject;
                }
                break;
            case
                EventSpecification::FOLLOW_A_WRITER :
                if ($entityObject instanceof Follow) {
                    $this->follow = $entityObject;
                }
                break;
            case
                EventSpecification::SEND_A_CHANNEL_SUBSCRIPTION_REQUEST ||
                EventSpecification::ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST ||
                EventSpecification::REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST :
                if ($entityObject instanceof ChannelSubscriptionRequest) {
                    $this->channelSubscriptionRequest = $entityObject;
                }
                break;
        }
    }

    public function getEventAuthor()
    {
        return $this->eventAuthor;
    }

    public function getEventSpecification()
    {
        return $this->eventSpecification;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getFollow()
    {
        return $this->follow;
    }

    public function getChannelSubscription()
    {
        return $this->channelSubscription;
    }

    public function getChannelSubscriptionRequest()
    {
        return $this->channelSubscriptionRequest;
    }
}