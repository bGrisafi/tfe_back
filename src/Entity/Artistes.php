<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource(formats={"json"={"application/json"}})
 * @ORM\Entity(repositoryClass="App\Repository\ArtistesRepository")
 */
class Artistes
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bibliographie_fr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bibliographie_en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oeuvres", mappedBy="artiste")
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBibliographieFr(): ?string
    {
        return $this->bibliographie_fr;
    }

    public function setBibliographieFr(?string $bibliographie_fr): self
    {
        $this->bibliographie_fr = $bibliographie_fr;

        return $this;
    }

    public function getBibliographieEn(): ?string
    {
        return $this->bibliographie_en;
    }

    public function setBibliographieEn(?string $bibliographie_en): self
    {
        $this->bibliographie_en = $bibliographie_en;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    function __toString(){
        return $this->nom;
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
            $oeuvre->setArtiste($this);
        }

        return $this;
    }

    public function removeOeuvre(Oeuvres $oeuvre): self
    {
        if ($this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->removeElement($oeuvre);
            // set the owning side to null (unless already changed)
            if ($oeuvre->getArtiste() === $this) {
                $oeuvre->setArtiste(null);
            }
        }

        return $this;
    }
}
