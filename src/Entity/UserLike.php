<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Store the likes added by users
 * @ORM\Entity(repositoryClass="App\Repository\UserLikeRepository")
 */
class UserLike
{
    const ARTICLE_CATEGORY = 1;
    const COMMENT_CATEGORY = 2;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="yes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="likes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $likedArticleComment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="likes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $likedArticle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $date): self
    {
        $this->createdAt = $date;

        return $this;
    }

    public function getLikedArticle()
    {
        return $this->likedArticle;
    }

    public function setLikedArticle(Article $article= null): self
    {
        $this->likedArticle = $article;

        return $this;
    }

    public function getLikedArticleComment()
    {
        return $this->likedArticleComment;
    }

    public function setLikedArticleComment(ArticleComment $comment = null): self
    {
        $this->likedArticleComment = $comment;

        return $this;
    }


    public function isLikeAppliedOnComment()
    {
        if ($this->category == UserLike::ARTICLE_CATEGORY) {
            return true;
        }
        return false;
    }




}
