<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FollowRepository")
 */
class Follow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="subscribedFollows")
     * @ORM\JoinColumn(name="follower_id", referencedColumnName="id", nullable=false)
     */
    private $follower;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="incomingFollows")
     * @ORM\JoinColumn(name="writer_id", referencedColumnName="id", nullable=false)
     */
    private $writer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="follow")
     */
    private $notificationEvents;


    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->notificationEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFollower(): ?User
    {
        return $this->follower;
    }

    public function setFollower(?User $follower): self
    {
        $this->follower = $follower;

        return $this;
    }

    public function getWriter(): ?User
    {
        return $this->writer;
    }

    public function setWriter(?User $writer): self
    {
        $this->writer = $writer;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

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
            $notificationEvent->setFollow($this);
        }

        return $this;
    }

    public function removeNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if ($this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents->removeElement($notificationEvent);
            // set the owning side to null (unless already changed)
            if ($notificationEvent->getFollow() === $this) {
                $notificationEvent->setFollow(null);
            }
        }

        return $this;
    }
}
