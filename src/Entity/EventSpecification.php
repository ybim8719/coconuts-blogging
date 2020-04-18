<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventSpecificationRepository")
 */
class EventSpecification
{
    const PUBLISH_ARTICLE_CODE  = 1;
    const PUBLISH_ARTICLE_ON_A_CHANNEL_CODE  = 2;
    const LIKE_AN_ARTICLE  = 3;
    const LIKE_A_COMMENT  = 4;
    const COMMENT_AN_ARTICLE  = 5;
    const REMOVE_AN_ARTICLE_COMMENT  = 6;
    const COMMENT_A_COMMENT_OF_ARTICLE  = 7;
    const REMOVE_A_COMMENT_OF_COMMENT_OF_ARTICLE  = 8;
    const SEND_A_CHANNEL_SUBSCRIPTION_REQUEST  = 9;
    const ACCEPT_A_CHANNEL_SUBSCRIPTION_REQUEST  = 10;
    const REFUSE_A_CHANNEL_SUBSCRIPTION_REQUEST  = 11;
    const FOLLOW_A_WRITER  = 12;
    const REMOVE_CHANNEL_SUBSCRIPTION_BY_USER  = 13;
    const REMOVE_CHANNEL_SUBSCRIPTION_BY_ADMIN  = 14;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireChannel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireArticle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireComment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireFollow;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireChannelSubscription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireChannelSubscriptionRequest;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="eventSpecification")
     */
    private $notificationEvents;

    /**
     * @ORM\Column(type="integer")
     */
    private $statusCode;

    public function __construct()
    {
        $this->notificationEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRequireChannel(): ?bool
    {
        return $this->requireChannel;
    }

    public function setRequireChannel(bool $requireChannel): self
    {
        $this->requireChannel = $requireChannel;

        return $this;
    }

    public function getRequireArticle(): ?bool
    {
        return $this->requireArticle;
    }

    public function setRequireArticle(bool $requireArticle): self
    {
        $this->requireArticle = $requireArticle;

        return $this;
    }

    public function getRequireComment(): ?bool
    {
        return $this->requireComment;
    }

    public function setRequireComment(bool $requireComment): self
    {
        $this->requireComment = $requireComment;

        return $this;
    }

    public function getRequireFollow(): ?bool
    {
        return $this->requireFollow;
    }

    public function setRequireFollow(bool $requireFollow): self
    {
        $this->requireFollow = $requireFollow;

        return $this;
    }

    public function getRequireChannelSubscription(): ?bool
    {
        return $this->requireChannelSubscription;
    }

    public function setRequireChannelSubscription(bool $requireChannelSubscription): self
    {
        $this->requireChannelSubscription = $requireChannelSubscription;

        return $this;
    }

    public function getRequireChannelSubscriptionRequest(): ?bool
    {
        return $this->requireChannelSubscriptionRequest;
    }

    public function setRequireChannelSubscriptionRequest(bool $requireChannelSubscriptionRequest): self
    {
        $this->requireChannelSubscriptionRequest = $requireChannelSubscriptionRequest;

        return $this;
    }

    /**
     * @return Collection|NotificationEvent[]
     */
    public function getNotificationEvents(): Collection
    {
        return $this->notificationEvents;
    }

    public function addNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if (!$this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents[] = $notificationEvent;
            $notificationEvent->setEventSpecification($this);
        }

        return $this;
    }

    public function removeNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if ($this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents->removeElement($notificationEvent);
            // set the owning side to null (unless already changed)
            if ($notificationEvent->getEventSpecification() === $this) {
                $notificationEvent->setEventSpecification(null);
            }
        }

        return $this;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
