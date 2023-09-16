<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"={"application/json"}})
 * @ORM\Entity(repositoryClass="App\Repository\ExpositionsRepository")
 */
class Expositions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="date")
     */
    private $dateVernissage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_en;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu_fr;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu_en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $illustration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDateVernissage(): ?\DateTimeInterface
    {
        return $this->dateVernissage;
    }

    public function setDateVernissage(\DateTimeInterface $dateVernissage): self
    {
        $this->dateVernissage = $dateVernissage;

        return $this;
    }

    public function getNomFr(): ?string
    {
        return $this->nom_fr;
    }

    public function setNomFr(string $nom_fr): self
    {
        $this->nom_fr = $nom_fr;

        return $this;
    }

    public function getNomEn(): ?string
    {
        return $this->nom_en;
    }

    public function setNomEn(string $nom_en): self
    {
        $this->nom_en = $nom_en;

        return $this;
    }

    public function getContenuFr(): ?string
    {
        return $this->contenu_fr;
    }

    public function setContenuFr(string $contenu_fr): self
    {
        $this->contenu_fr = $contenu_fr;

        return $this;
    }

    public function getContenuEn(): ?string
    {
        return $this->contenu_en;
    }

    public function setContenuEn(string $contenu_en): self
    {
        $this->contenu_en = $contenu_en;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(?string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }
    function __toString(){
        return $this->titre_fr;
    }
}
