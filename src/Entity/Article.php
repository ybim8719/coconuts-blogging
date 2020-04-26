<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @Vich\Uploadable
 */
class Article
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chapeau;

    /**
     * @ORM\Column(type="text", length=30000)
     */
    private $description;

    /** 
    * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="articles", fetch="EAGER")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="articles_pictures", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int|null
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleComment", mappedBy="article")
     * 
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserLike", mappedBy="likedArticle")
     * 
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleVisit", mappedBy="article")
     */
    private $articleVisits;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookMark", mappedBy="article")
     */
    private $bookMarks;


    /**
     * @ORM\Column(type="datetime", nullable = true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Channel", inversedBy="articles")
     */
    private $channel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationEvent", mappedBy="article")
     */
    private $notificationEvents;
    
    public function __construct()
    {
        $this->setCreatedAt(new DateTime('now'));
        $this->setUpdatedAt(new DateTime('now'));
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->articleVisits = new ArrayCollection();
        $this->bookMarks = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getChapeau()
    {
        return $this->chapeau;
    }

    /**
     * @param mixed $chapeau
     */
    public function setChapeau($chapeau): void
    {
        $this->chapeau = $chapeau;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $writer): self
    {
        //if user didn't wrote anything before or has written articles and is not a writer, he automatically becomes a writer
        if($writer->getNbOfWrittenArticles() == 0 || ($writer->getNbOfWrittenArticles() > 0 && $writer->getIsWriter() == false)) {
            $writer->setIsWriter(true);
        }
        $this->user = $writer;
       
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

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $date): self
    {
        $this->updatedAt = $date;

        return $this;
    }


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new DateTime();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    
    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    /**
     * @return Collection|ArticleComment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(ArticleComment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArticle($this);
        }

        return $this;
    }

    public function removeComment(ArticleComment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getArticle() === $this) {
                $comment->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserLike[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(UserLike $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setLikedArticle($this);
        }

        return $this;
    }

    public function removeLike(UserLike $like): self
    {
        if ($this->likes->contains($like)) {
            $this->likes->removeElement($like);
            if ($like->getLikedArticle() === $this) {
                $like->setLikedArticle(null);
            }
        }

        return $this;
    }

    public function getNbOfLikes()
    {
        return count($this->likes);
    }

    public function getNbOfComments()
    {
        return count($this->comments);
    }

    /**
     * @return Collection|ArticleVisit[]
     */
    public function getArticleVisits(): Collection
    {
        return $this->articleVisits;
    }

    public function getNbOfVisits()
    {
        return count($this->articleVisits);
    }

    public function addArticleVisit(ArticleVisit $articleVisit): self
    {
        if (!$this->articleVisits->contains($articleVisit)) {
            $this->articleVisits[] = $articleVisit;
            $articleVisit->setArticle($this);
        }

        return $this;
    }

    public function removeArticleVisit(ArticleVisit $articleVisit): self
    {
        if ($this->articleVisits->contains($articleVisit)) {
            $this->articleVisits->removeElement($articleVisit);
            if ($articleVisit->getArticle() === $this) {
                $articleVisit->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookMark[]
     */
    public function getBookMarks(): Collection
    {
        return $this->bookMarks;
    }

    public function addBookMark(BookMark $bookMark): self
    {
        if (!$this->bookMarks->contains($bookMark)) {
            $this->bookMarks[] = $bookMark;
            $bookMark->setArticle($this);
        }

        return $this;
    }

    public function removeBookMark(BookMark $bookMark): self
    {
        if ($this->bookMarks->contains($bookMark)) {
            $this->bookMarks->removeElement($bookMark);
            // set the owning side to null (unless already changed)
            if ($bookMark->getArticle() === $this) {
                $bookMark->setArticle(null);
            }
        }

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
            $notificationEvent->setArticle($this);
        }

        return $this;
    }

    public function removeNotificationEvent(NotificationEvent $notificationEvent): self
    {
        if ($this->notificationEvents->contains($notificationEvent)) {
            $this->notificationEvents->removeElement($notificationEvent);
            // set the owning side to null (unless already changed)
            if ($notificationEvent->getArticle() === $this) {
                $notificationEvent->setArticle(null);
            }
        }

        return $this;
    }
}