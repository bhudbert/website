<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Gallery::class, inversedBy="contents")
     */
    private $galleries;

    /**
     * @ORM\ManyToMany(targetEntity=TextBlock::class, inversedBy="contents")
     */
    private $textblocks;

    public function __construct()
    {
        $this->galleries = new ArrayCollection();
        $this->textblocks = new ArrayCollection();
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

    /**
     * @return Collection|Gallery[]
     */
    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        $this->galleries->removeElement($gallery);

        return $this;
    }

    /**
     * @return Collection|TextBlock[]
     */
    public function getTextblocks(): Collection
    {
        return $this->textblocks;
    }

    public function addTextblock(TextBlock $textblock): self
    {
        if (!$this->textblocks->contains($textblock)) {
            $this->textblocks[] = $textblock;
        }

        return $this;
    }

    public function removeTextblock(TextBlock $textblock): self
    {
        $this->textblocks->removeElement($textblock);

        return $this;
    }
}
