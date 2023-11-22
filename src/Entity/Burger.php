<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
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
    private ?array $oignon = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToMany(targetEntity: Sauce::class, mappedBy: 'burger')]
    private ?array $sauce = null;

    #[ORM\JoinColumn(nullable: true)]
    #[ORM\OneToOne(targetEntity: Commentaire::class, cascade: ['persist', 'remove'])]
    private ?array $commentaire = null;
    

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
}
