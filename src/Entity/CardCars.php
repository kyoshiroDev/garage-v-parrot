<?php

namespace App\Entity;

use App\Repository\CardCarsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardCarsRepository::class)]
class CardCars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $marque = null;

    #[ORM\Column(length: 20)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $kilometre = null;

    #[ORM\Column]
    private ?int $porte = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column]
    private ?int $année = null;

    #[ORM\Column]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getKilometre(): ?int
    {
        return $this->kilometre;
    }

    public function setKilometre(int $kilometre): static
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    public function getPorte(): ?int
    {
        return $this->porte;
    }

    public function setPorte(int $porte): static
    {
        $this->porte = $porte;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): static
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getAnnée(): ?int
    {
        return $this->année;
    }

    public function setAnnée(int $année): static
    {
        $this->année = $année;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
