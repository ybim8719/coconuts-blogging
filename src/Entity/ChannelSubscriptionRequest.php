<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChannelSubscriptionRequestRepository")
 */
class ChannelSubscriptionRequest
{
    const CHANNEL_SUBSCRIPTION_ACCEPTED = 0;
    const CHANNEL_SUBSCRIPTION_REFUSED= 1;
    const CHANNEL_SUBSCRIPTION_PENDING = 2;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Channel", inversedBy="channelSubscriptionRequests")
     */
    private $channel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="channelSubscriptionRequests")
     */
    private $applicant;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
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

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function setChannel(?Channel $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getApplicant(): ?User
    {
        return $this->applicant;
    }

    public function setApplicant(?User $applicant): self
    {
        $this->applicant = $applicant;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStringStatus()
    {
        switch ($this->getStatus()) {
            case self::CHANNEL_SUBSCRIPTION_ACCEPTED:
                return "Demande acceptée";
                break;
            case self::CHANNEL_SUBSCRIPTION_REFUSED:
                return "Demande refusée";
                break;
            case self::CHANNEL_SUBSCRIPTION_PENDING:
                return "Demande en attente";
                break;
            default:
                return "Pas d'infos";
        }
    }
}
