<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notifications")
     */
    private $recipient;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wasRead;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NotificationEvent", inversedBy="notifications")
     */
    private $notificationEvent;

    public  function  __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->wasRead = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipient(): ?User
    {
        return $this->recipient;
    }

    public function setRecipient(?User $recipient): self
    {
        $this->recipient = $recipient;

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

    public function getWasRead(): ?bool
    {
        return $this->wasRead;
    }

    public function setWasRead(bool $wasRead): self
    {
        $this->wasRead = $wasRead;

        return $this;
    }

    public function getNotificationEvent(): ?NotificationEvent
    {
        return $this->notificationEvent;
    }

    public function setNotificationEvent(?NotificationEvent $notificationEvent): self
    {
        $this->notificationEvent = $notificationEvent;

        return $this;
    }
}
