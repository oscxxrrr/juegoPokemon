<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pokemon')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $trainer = null;

    #[ORM\ManyToOne(inversedBy: 'pokemon')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pokedex $pokedex = null;

    #[ORM\Column]
    private ?int $combatPoints = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainer(): ?User
    {
        return $this->trainer;
    }

    public function setTrainer(?User $trainer): static
    {
        $this->trainer = $trainer;

        return $this;
    }

    public function getPokedex(): ?Pokedex
    {
        return $this->pokedex;
    }

    public function setPokedex(?Pokedex $pokedex): static
    {
        $this->pokedex = $pokedex;

        return $this;
    }

    public function getCombatPoints(): ?int
    {
        return $this->combatPoints;
    }

    public function setCombatPoints(int $combatPoints): static
    {
        $this->combatPoints = $combatPoints;

        return $this;
    }
}
