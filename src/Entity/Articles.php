<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource(formats={"json"={"application/json"}}, attributes={"order"={"dateCreation":"DESC"}})
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
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
     * @ORM\Column(type="text")
     */
    private $contenu_fr;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu_en;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaires", mappedBy="article")
     * @ApiSubresource
     */
    private $commentaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;


    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

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

    public function getUtilisateurs(): ?user
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?user $utilisateurs): self
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * @return Collection|Commentaires[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaires $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setArticle($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getArticle() === $this) {
                $commentaire->setArticle(null);
            }
        }

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
    function __toString(){
        return $this->titre_fr;
    }


}
