<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToOne(targetEntity: Image::class, cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToOne(targetEntity: Pain::class, cascade: ['persist', 'remove'])]
    private ?Pain $pain = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\ManyToMany(targetEntity: Oignon::class)]
    private ?Oignon $oignon = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: Sauce::class, mappedBy: 'burger')]
    private ?Collection $sauce;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: Commentaire::class, cascade: ['persist', 'remove'], mappedBy: 'burger')]
    private ?Collection $commentaire;
    
    public function __construct()
    {
        $this->sauce = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(Image $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getPain(): ?Pain
    {
        return $this->pain;
    }

    public function setPain(Pain $pain): static
    {
        $this->pain = $pain;

        return $this;
    }

    public function getOignon(): ?Oignon
    {
        return $this->oignon;
    }

    public function setOignon(Oignon $oignon): static
    {
        $this->oignon = $oignon;

        return $this;
    }

    public function getSauce(): Collection | Sauce
    {
        return $this->sauce;
    }

    public function setSauce(Collection $sauce): static
    {
        $this->sauce = $sauce;

        return $this;
    }
    public function addSauce(Sauce $sauce): static
    {
        $this->sauce->add($sauce);

        return $this;
    }

    public function getCommentaire(): Collection | Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(Collection  $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function addcommentaire(Commentaire $commentaire): static
    {
        $this->commentaire->add($commentaire);

        return $this;
    }

}
