<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $point;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vente", mappedBy="User")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(?int $point): self
    {
        $this->point = $point;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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
            $venteId->setUser($this);
        }

        return $this;
    }

    public function removeVenteId(Vente $venteId): self
    {
        if ($this->vente_id->contains($venteId)) {
            $this->vente_id->removeElement($venteId);
            // set the owning side to null (unless already changed)
            if ($venteId->getUser() === $this) {
                $venteId->setUser(null);
            }
        }

        return $this;
    }
}
