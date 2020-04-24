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
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="eventSpecification")
     */
    private $notificationEvents;

    /**
     * @ORM\Column(type="integer")
     */
    private $statusCode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EntityPathName", inversedBy="eventSpecifications")
     */
    private $entityPathName;

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

    public function getEntityPathName(): ?EntityPathName
    {
        return $this->entityPathName;
    }

    public function setEntityPathName(?EntityPathName $entityPathName): self
    {
        $this->entityPathName = $entityPathName;

        return $this;
    }
}
