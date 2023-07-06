<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
#[UniqueEntity(fields: ['jours'], message: 'Ce jour existe déjà')]
class Horaire 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $jours = null;

    #[ORM\Column(length: 30)]
    private ?string $heures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->jours;
    }

    public function setJours(string $jours): static
    {
        $this->jours = $jours;

        return $this;
    }

    public function getHeures(): ?string
    {
        return $this->heures;
    }

    public function setHeures(string $heures): static
    {
        $this->heures = $heures;

        return $this;
    }
}
