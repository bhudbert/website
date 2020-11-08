<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="pages")
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 * @UniqueEntity("name",message="Attention cette formation existe deja")
 * @UniqueEntity("slug",message="Attention ce slug existe deja")
 */
class Page
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $slug;

    /**Gallery
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Content")
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technology")
     */
    private $technology;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Gallery")
     */
    private $Galleries;

    public function __construct()
    {
        $this->technology = new ArrayCollection();
        $this->Galleries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|Technology[]
     */
    public function getTechnology(): Collection
    {
        return $this->technology;
    }

    public function addTechnology(Technology $technology): self
    {
        if (!$this->technology->contains($technology)) {
            $this->technology[] = $technology;
        }

        return $this;
    }

    public function removeTechnology(Technology $technology): self
    {
        if ($this->technology->contains($technology)) {
            $this->technology->removeElement($technology);
        }

        return $this;
    }

    /**
     * @return Collection|Gallery[]
     */
    public function getGalleries(): Collection
    {
        return $this->Galleries;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->Galleries->contains($gallery)) {
            $this->Galleries[] = $gallery;
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        if ($this->Galleries->contains($gallery)) {
            $this->Galleries->removeElement($gallery);
        }

        return $this;
    }
}
