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


    public function __construct()
    {
        $this->channelSubscriptions = new ArrayCollection();
        $this->articles = new ArrayCollection();
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

    public function getNbOfArticles()
    {
        return count($this->articles);
    }

    public function getNbOfChannelSubscriptions()
    {
        return count($this->channelSubscriptions);
    }
}
