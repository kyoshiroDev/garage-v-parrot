<?php

namespace App\Entity;

use App\Repository\PrestationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: PrestationsRepository::class)]
#[UniqueEntity(fields: ['prestations'], message: 'Cette prestation existe déjà')]

class Prestations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez saisir une prestation')]
    #[Assert\Length(min: 2, max: 255)]
    
    private ?string $prestations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrestations(): ?string
    {
        return $this->prestations;
    }

    public function setPrestations(string $prestations): static
    {
        $this->prestations = $prestations;

        return $this;
    }
}
