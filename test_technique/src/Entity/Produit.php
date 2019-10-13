<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $point;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vente", mappedBy="Produit")
     */
    private $vente_id;

    public function __construct()
    {
        $this->vente_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(int $point): self
    {
        $this->point = $point;

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVenteId(): Collection
    {
        return $this->vente_id;
    }

    public function addVenteId(Vente $venteId): self
    {
        if (!$this->vente_id->contains($venteId)) {
            $this->vente_id[] = $venteId;
            $venteId->setProduit($this);
        }

        return $this;
    }

    public function removeVenteId(Vente $venteId): self
    {
        if ($this->vente_id->contains($venteId)) {
            $this->vente_id->removeElement($venteId);
            // set the owning side to null (unless already changed)
            if ($venteId->getProduit() === $this) {
                $venteId->setProduit(null);
            }
        }

        return $this;
    }
}
