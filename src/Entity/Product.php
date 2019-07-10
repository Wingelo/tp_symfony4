<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    public function __toString()
    {
        return $this->getNomProduit();
    }
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Gedmo\Slug(fields={"nom_produit"})
     */
    private $slug;


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorys;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", mappedBy="product")
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom_produit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $love;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorys(): ?Category
    {
        return $this->categorys;
    }

    public function setCategorys(?Category $categorys): self
    {
        $this->categorys = $categorys;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addProduct($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeProduct($this);
        }

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): self
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getLove(): ?int
    {
        return $this->love;
    }

    public function setLove(?int $love): self
    {
        $this->love = $love;

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

}
