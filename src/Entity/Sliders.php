<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"={"application/json"}})
 * @ORM\Entity(repositoryClass="App\Repository\SlidersRepository")
 */
class Sliders
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
    private $titre_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_en;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu_fr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreFr(): ?string
    {
        return $this->titre_fr;
    }

    public function setTitreFr(string $titre_fr): self
    {
        $this->titre_fr = $titre_fr;

        return $this;
    }

    public function getTitreEn(): ?string
    {
        return $this->titre_en;
    }

    public function setTitreEn(string $titre_en): self
    {
        $this->titre_en = $titre_en;

        return $this;
    }

    public function getContenuFr(): ?string
    {
        return $this->contenu_fr;
    }

    public function setContenuFr(?string $contenu_fr): self
    {
        $this->contenu_fr = $contenu_fr;

        return $this;
    }

    public function getContenuEn(): ?string
    {
        return $this->contenu_en;
    }

    public function setContenuEn(?string $contenu_en): self
    {
        $this->contenu_en = $contenu_en;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    function __toString(){
        return $this->titre_fr;
    }
}
