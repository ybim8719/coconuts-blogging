<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationEventRepository")
 */
class NotificationEvent
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EventSpecification", inversedBy="notificationEvents")
     */
    private $eventSpecification;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notificationEvents")
     */
    private $triggerUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="notificationEvents")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Channel", inversedBy="notificationEvents")
     */
    private $channel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ArticleComment", inversedBy="notificationEvents")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Follow", inversedBy="notificationEvents")
     */
    private $follow;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ChannelSubscription", inversedBy="notificationEvents")
     */
    private $channelSubscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ChannelSubscriptionRequest", inversedBy="notificationEvents")
     */
    private $channelSubscriptionRequest;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="noticationEvent")
     */
    private $notifications;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEventSpecification(): ?EventSpecification
    {
        return $this->eventSpecification;
    }

    public function setEventSpecification(?EventSpecification $eventSpecification): self
    {
        $this->eventSpecification = $eventSpecification;

        return $this;
    }

    public function getTriggerUser(): ?User
    {
        return $this->triggerUser;
    }

    public function setTriggerUser(?User $triggerUser): self
    {
        $this->triggerUser = $triggerUser;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function setChannel(?Channel $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getComment(): ?ArticleComment
    {
        return $this->comment;
    }

    public function setComment(?ArticleComment $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getFollow(): ?Follow
    {
        return $this->follow;
    }

    public function setFollow(?Follow $follow): self
    {
        $this->follow = $follow;

        return $this;
    }

    public function getChannelSubscription(): ?ChannelSubscription
    {
        return $this->channelSubscription;
    }

    public function setChannelSubscription(?ChannelSubscription $channelSubscription): self
    {
        $this->channelSubscription = $channelSubscription;

        return $this;
    }

    public function getChannelSubscriptionRequest(): ?ChannelSubscriptionRequest
    {
        return $this->channelSubscriptionRequest;
    }

    public function setChannelSubscriptionRequest(?ChannelSubscriptionRequest $channelSubscriptionRequest): self
    {
        $this->channelSubscriptionRequest = $channelSubscriptionRequest;

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setNoticationEvent($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getNoticationEvent() === $this) {
                $notification->setNoticationEvent(null);
            }
        }

        return $this;
    }
}
