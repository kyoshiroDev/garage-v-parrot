<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CardCarsRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CardCarsRepository::class)]
#[Vich\Uploadable]
class CardCars
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[Vich\UploadableField(mapping: 'vehicules', fileNameProperty: 'imageName')]
  private ?File $imageFile = null;

  #[ORM\Column(nullable: true)]
  private ?string $imageName = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $updatedAt = null;

  #[ORM\Column(length: 20)]
  #[Assert\Length(min: 2, max: 20,)]
  #[Assert\NotBlank(message: 'Veuillez saisir une marque')]
  private ?string $marque = null;

  #[ORM\Column(length: 20)]
  #[Assert\Length(min: 2, max: 20,)]
  #[Assert\NotBlank(message: 'Veuillez saisir un model')]
  private ?string $model = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir le nombre de kilomètre')]
  #[Assert\PositiveOrZero(message: 'Veuillez saisir un nombre supérieur ou égal à 0')]
  private ?int $kilometre = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir un nombre de porte')]
  #[Assert\Positive(message: 'Veuillez saisir un nombre supérieur à 0')]
  #[Assert\PositiveOrZero(message: 'Veuillez saisir un nombre supérieur ou égal à 0')]
  private ?int $porte = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir une puissance')]
  #[Assert\Positive(message: 'Veuillez saisir un nombre supérieur à 0')]
  #[Assert\Length(min: 1, max: 3)]
  private ?int $puissance = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir une année')]
  #[Assert\Positive()]
  #[Assert\Length(min: 4, max: 4)]
  private ?int $annee = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir un prix')]
  #[Assert\Positive(message: 'Veuillez saisir un nombre supérieur à 0')]
  #[Assert\Length(min: 1, max: 5)]
  private ?float $prix = null;

  #[ORM\Column(length: 20)]
  private ?string $energie = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setImageFile(?File $imageFile = null): void
  {
    $this->imageFile = $imageFile;

    if ($this->imageFile instanceof UploadedFile) {
      $this->updatedAt = new \DateTimeImmutable();
    }
  }

  public function getImageFile(): ?File
  {
    return $this->imageFile;
  }

  public function setImageName(?string $imageName): void
  {
    $this->imageName = $imageName;
  }

  public function getImageName(): ?string
  {
    return $this->imageName;
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

  public function getAnnee(): ?int
  {
    return $this->annee;
  }

  public function setAnnee(int $annee): static
  {
    $this->annee = $annee;

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

  public function getEnergie(): ?string
  {
    return $this->energie;
  }

  public function setEnergie(string $energie): static
  {
    $this->energie = $energie;

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeImmutable
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(?\DateTimeImmutable $updatedAt): void
  {
    $this->updatedAt = $updatedAt;
  }
}
