<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
/**
 * @ApiResource(formats={"json"={"application/json"}})
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
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
    private $categorie_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie_en;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oeuvres", mappedBy="categorie")
     * @ApiSubresource(maxDepth=1)
     */
    private $oeuvres;

    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieFr(): ?string
    {
        return $this->categorie_fr;
    }

    public function setCategorieFr(string $categorie_fr): self
    {
        $this->categorie_fr = $categorie_fr;

        return $this;
    }

    public function getCategorieEn(): ?string
    {
        return $this->categorie_en;
    }

    public function setCategorieEn(string $categorie_en): self
    {
        $this->categorie_en = $categorie_en;

        return $this;
    }

      function __toString(){
          return $this->categorie_fr;
      }

    /**
     * @return Collection|Oeuvres[]
     */
    public function getOeuvres(): Collection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Oeuvres $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres[] = $oeuvre;
            $oeuvre->setCategorie($this);
        }

        return $this;
    }

    public function removeOeuvre(Oeuvres $oeuvre): self
    {
        if ($this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->removeElement($oeuvre);
            // set the owning side to null (unless already changed)
            if ($oeuvre->getCategorie() === $this) {
                $oeuvre->setCategorie(null);
            }
        }

        return $this;
    }

}
