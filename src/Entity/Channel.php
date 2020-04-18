<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChannelRepository")
 */
class Channel
{
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChannelSubscription", mappedBy="channel")
     */
    private $channelSubscriptions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="channel")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChannelSubscriptionRequest", mappedBy="channel")
     */
    private $channelSubscriptionRequests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="channel")
     */
    private $notificationEvents;


    public function __construct()
    {
        $this->channelSubscriptions = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->channelSubscriptionRequests = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|ChannelSubscription[]
     */
    public function getChannelSubscriptions(): Collection
    {
        return $this->channelSubscriptions;
    }

    public function addChannelSubscription(ChannelSubscription $channelSubscription): self
    {
        if (!$this->channelSubscriptions->contains($channelSubscription)) {
            $this->channelSubscriptions[] = $channelSubscription;
            $channelSubscription->setChannel($this);
        }

        return $this;
    }

    public function removeChannelSubscription(ChannelSubscription $channelSubscription): self
    {
        if ($this->channelSubscriptions->contains($channelSubscription)) {
            $this->channelSubscriptions->removeElement($channelSubscription);
            if ($channelSubscription->getChannel() === $this) {
                $channelSubscription->setChannel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setChannel($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getChannel() === $this) {
                $article->setChannel(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|ChannelSubscriptionRequest[]
     */
    public function getChannelSubscriptionRequests(): Collection
    {
        return $this->channelSubscriptionRequests;
    }

    public function addChannelSubscriptionRequest(ChannelSubscriptionRequest $channelSubscriptionRequest): self
    {
        if (!$this->channelSubscriptionRequests->contains($channelSubscriptionRequest)) {
            $this->channelSubscriptionRequests[] = $channelSubscriptionRequest;
            $channelSubscriptionRequest->setChannel($this);
        }

        return $this;
    }

    public function removeChannelSubscriptionRequest(ChannelSubscriptionRequest $channelSubscriptionRequest): self
    {
        if ($this->channelSubscriptionRequests->contains($channelSubscriptionRequest)) {
            $this->channelSubscriptionRequests->removeElement($channelSubscriptionRequest);
            // set the owning side to null (unless already changed)
            if ($channelSubscriptionRequest->getChannel() === $this) {
                $channelSubscriptionRequest->setChannel(null);
            }
        }

        return $this;
    }

    public function getNbOfArticles()
    {
        return count($this->articles);
    }

    public function getNbOfChannelSubscriptions()
    {
        return count($this->channelSubscriptions);
    }


    public function getAdminUsers()
    {
        $tab = [];

        foreach ($this->channelSubscriptions as $channelSubscription) {
            if ($channelSubscription->getIsAdmin()) {
                $tab[] = $channelSubscription->getUser();
            }
        }

        return $tab;
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
            $notificationEvent->setChannel($this);
        }

        return $this;
    }

    public function removeNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if ($this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents->removeElement($notificationEvent);
            // set the owning side to null (unless already changed)
            if ($notificationEvent->getChannel() === $this) {
                $notificationEvent->setChannel(null);
            }
        }

        return $this;
    }
}
