<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity('email', message: 'Cette adresse email est déjà utilisée')]
#[UniqueEntity('name', message: 'Ce nom est déjà utilisé')]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 180, unique: true)]
  #[Assert\NotBlank(message: 'Veuillez saisir une adresse email')]
  #[Assert\Length(min: 2, max: 180)]
  #[Assert\Email(message: 'Veuillez saisir une adresse email valide')]
  #[Assert\Unique(message: 'Cette adresse email est déjà utilisée')]
  #[Assert\Regex(pattern: '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', message: 'Veuillez saisir une adresse email valide')]

  private ?string $email = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  private ?string $plainPassword = null;

  /**
   * @var string The hashed password
   */
  #[ORM\Column]
  #[Assert\NotBlank(message: 'Veuillez saisir un mot de passe')]
  #[Assert\Length(min: 6, max: 255)]
  #[Assert\Regex(pattern: '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/', message: 'Veuillez saisir un mot de passe valide')]
  #[Assert\NotEqualTo(value: 'Mot de passe', message: 'Veuillez saisir un mot de passe valide')]
  private ?string $password = null;

  #[ORM\Column]
  #[Assert\NotNull(message: 'Veuillez choisir au moins un rôle')]
  private array $roles = [];

  #[ORM\Column(type: 'datetime_immutable')]
  #[Assert\NotNull]
  private \DateTimeImmutable $createdAt;

  public function __construct()
  {
    $this->createdAt = new \DateTimeImmutable();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): static
  {
    $this->email = $email;

    return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;

    return $this;
  }
  public function getUserIdentifier(): string
  {
    return (string) $this->email;
  }

  /**
   * @see UserInterface
   */
  public function getRoles(): array
  {
    $roles = $this->roles;
    // guarantee every user at least has ROLE_USER
    $roles[] = 'Utilisateur';

    return array_unique($roles);
  }

  public function setRoles(array $roles): static
  {
    $this->roles = $roles;

    return $this;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): static
  {
    $this->password = $password;

    return $this;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials(): void
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeImmutable $createdAt): static
  {
    $this->createdAt = $createdAt;

    return $this;
  }
}