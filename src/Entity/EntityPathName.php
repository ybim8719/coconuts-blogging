<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntityPathNameRepository")
 */
class EntityPathName
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
    private $pathName;

    /**
     * @ORM\Column(type="integer")
     */
    private $statusCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EventSpecification", mappedBy="entityPathName")
     */
    private $eventSpecifications;

    public function __construct()
    {
        $this->eventSpecifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathName(): ?string
    {
        return $this->pathName;
    }

    public function setPathName(string $pathName): self
    {
        $this->pathName = $pathName;

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

    /**
     * @return Collection|EventSpecification[]
     */
    public function getEventSpecifications(): Collection
    {
        return $this->eventSpecifications;
    }

    public function addEventSpecification(EventSpecification $eventSpecification): self
    {
        if (!$this->eventSpecifications->contains($eventSpecification)) {
            $this->eventSpecifications[] = $eventSpecification;
            $eventSpecification->setEntityPathName($this);
        }

        return $this;
    }

    public function removeEventSpecification(EventSpecification $eventSpecification): self
    {
        if ($this->eventSpecifications->contains($eventSpecification)) {
            $this->eventSpecifications->removeElement($eventSpecification);
            // set the owning side to null (unless already changed)
            if ($eventSpecification->getEntityPathName() === $this) {
                $eventSpecification->setEntityPathName(null);
            }
        }

        return $this;
    }
}
