<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User implements UserInterface
{
    const MAX_PROFIL_DESCRIPTION_LENGTH = 500;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdmin;

    /**
     * @ORM\Column(type="string", length = 500)
     */
    private $profileDescription;
   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="user")
     */
    private $articles;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="users_pictures", fileNameProperty="imageName", size="imageSize")
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleComment", mappedBy="author")
     */
    private $publishedComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserLike", mappedBy="user", orphanRemoval=true)
     */
    private $publishedLikes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Follow", mappedBy="follower", orphanRemoval=true)
     */
    private $incomingFollows;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Follow", mappedBy="writer", orphanRemoval=true)
     */
    private $subscribedFollows;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isWriter;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookMark", mappedBy="user")
     */
    private $bookMarks;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChannelSubscription", mappedBy="user")
     */
    private $channelSubscriptions;


    public function __construct()
    {
        $this->setCreatedAt(new DateTime('now'));
        $this->setIsAdmin(false);
        $this->setIsWriter(false);
        $this->incomingFollows = new ArrayCollection();
        $this->publishedLikes = new ArrayCollection();
        $this->publishedComments = new ArrayCollection();
        $this->subscribedFollows = new ArrayCollection();
        $this->bookMarks = new ArrayCollection();
        $this->channelSubscriptions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getProfileDescription(): ?string
    {
        return $this->profileDescription;
    }

    public function setProfileDescription(string $text) : self
    {
        $this->profileDescription = $text;
        return $this;
    }

    public function getIsWriter()
    {
        return $this->isWriter;
    }

    public function setIsWriter(bool $isWriter)
    {
        $this->isWriter = $isWriter;
    }

     /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
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

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticle(Article $article)
    {
        return $this->articles = $article;
    }


    

    /**
     * @return Collection|ArticleComment[]
     */
    public function getPublishedComments(): Collection
    {
        return $this->publishedComments;
    }

    public function addPublishedComment(ArticleComment $publishedComment): self
    {
        if (!$this->publishedComments->contains($publishedComment)) {
            $this->publishedComments[] = $publishedComment;
            $publishedComment->setAuthor($this);
        }

        return $this;
    }

    public function removePublishedComment(ArticleComment $publishedComment): self
    {
        if ($this->publishedComments->contains($publishedComment)) {
            $this->publishedComments->removeElement($publishedComment);
            // set the owning side to null (unless already changed)
            if ($publishedComment->getAuthor() === $this) {
                $publishedComment->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserLike[]
     */
    public function getPublishedLikes(): Collection
    {
        return $this->publishedLikes;
    }

    public function addPublishedLike(UserLike $publishedLike): self
    {
        if (!$this->publishedLikes->contains($publishedLike)) {
            $this->publishedLikes[] = $publishedLike;
            $publishedLike->setUser($this);
        }

        return $this;
    }

    public function removePublishedLike(UserLike $like): self
    {
        if ($this->publishedLikes->contains($like)) {
            $this->publishedLikes->removeElement($like);
            // set the owning side to null (unless already changed)
            if ($like->getUser() === $this) {
                $like->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Follow[]
     */
    public function getIncomingFollows(): Collection
    {
        return $this->incomingFollows;
    }

    public function addIncomingFollow(Follow $incomingFollow): self
    {
        if (!$this->incomingFollows->contains($incomingFollow)) {
            $this->incomingFollows[] = $incomingFollow;
            $incomingFollow->setFollower($this);
        }

        return $this;
    }

    public function removeIncomingFollow(Follow $incomingFollow): self
    {
        if ($this->incomingFollows->contains($incomingFollow)) {
            $this->incomingFollows->removeElement($incomingFollow);
            // set the owning side to null (unless already changed)
            if ($incomingFollow->getFollower() === $this) {
                $incomingFollow->setFollower(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Follow[]
     */
    public function getSubscribedFollows(): Collection
    {
        return $this->subscribedFollows;
    }

    public function addSubscribedFollow(Follow $subscribedFollow): self
    {
        if (!$this->subscribedFollows->contains($subscribedFollow)) {
            $this->subscribedFollows[] = $subscribedFollow;
            $subscribedFollow->setWriter($this);
        }

        return $this;
    }

    public function removeSubscribedFollow(Follow $subscribedFollow): self
    {
        if ($this->subscribedFollows->contains($subscribedFollow)) {
            $this->subscribedFollows->removeElement($subscribedFollow);
            // set the owning side to null (unless already changed)
            if ($subscribedFollow->getWriter() === $this) {
                $subscribedFollow->setWriter(null);
            }
        }

        return $this;
    }


    public function getRoles() 
    { 
        return ['ROLE_USER']; 
    }

    public function eraseCredentials() {}

    public function getSalt() {}

    public function getNbOfArticles()
    {
        return count($this->articles);
    }

    public function getNbOfIncomingFollows()
    {
        return count($this->incomingFollows);
    }

    public function getNbOfSubscribedFollows()
    {
        return count($this->subscribedFollows);
    } 

    public function getNbOfPublishedComments()
    {
        return count($this->publishedComments);
    } 

    public function getNbOfPublishedLikes()
    {
        return count($this->publishedLikes);
    } 

    public function getNbOfWrittenArticles()
    {
        return count($this->articles);
    }

    public function hasWritten(): bool
    {
        if (count($this->articles)>0) {
            return true;
        }

        return false;
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
            $bookMark->setUser($this);
        }

        return $this;
    }

    public function removeBookMark(BookMark $bookMark): self
    {
        if ($this->bookMarks->contains($bookMark)) {
            $this->bookMarks->removeElement($bookMark);
            if ($bookMark->getUser() === $this) {
                $bookMark->setUser(null);
            }
        }

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
            $channelSubscription->setUser($this);
        }

        return $this;
    }

    public function removeChannelSubscription(ChannelSubscription $channelSubscription): self
    {
        if ($this->channelSubscriptions->contains($channelSubscription)) {
            $this->channelSubscriptions->removeElement($channelSubscription);
            // set the owning side to null (unless already changed)
            if ($channelSubscription->getUser() === $this) {
                $channelSubscription->setUser(null);
            }
        }

        return $this;
    }

    public function hasBookmarkedArticle(Article $article)
    {
        foreach($this->getBookMarks() as $bookMark) {
            if ($bookMark->getArticle()->getId() === $article->getId()) {
                return true;
            }
        }
        return false;
    }


    public function hasBookmarkedArticleComment(ArticleComment $articleComment)
    {
        if (count($this->getBookMarks()) > 0) {
            foreach($this->getBookMarks() as $bookmark) {
                if ($bookmark->getArticleComment()->getId() === $articleComment->getId()) {
                    return true;
                }
            }
        }

        return false;
    }
}
