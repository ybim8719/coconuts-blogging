<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChannelSubscriptionRepository")
 */
class ChannelSubscription
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdmin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="channelSubscriptions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Channel", inversedBy="channelSubscriptions")
     */
    private $channel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="channelSubscription")
     */
    private $notificationEvents;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
        $this->notificationEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $UpdatedAt): self
    {
        $this->updatedAt = $UpdatedAt;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
            $notificationEvent->setChannelSubscription($this);
        }

        return $this;
    }

    public function removeNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if ($this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents->removeElement($notificationEvent);
            // set the owning side to null (unless already changed)
            if ($notificationEvent->getChannelSubscription() === $this) {
                $notificationEvent->setChannelSubscription(null);
            }
        }

        return $this;
    }
}
