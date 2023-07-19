<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[UniqueEntity('email', message: 'Cette adresse email est déjà utilisée')]
#[ORM\Entity(repositoryClass: UserRepository::class)]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{

  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: 'string', length: 255)]
  #[Assert\NotBlank(message: 'Veuillez saisir un nom')]
  private ?string $lastName = null;

  #[ORM\Column(type: 'string', length: 255)]
  #[Assert\NotBlank(message: 'Veuillez saisir un prénom')]
  private ?string $firstName = null;

  #[ORM\Column(type: 'string', length: 180, unique: true)]
  #[Assert\NotBlank(message: 'Veuillez saisir une adresse email')]
  #[Assert\Length(min: 2, max: 180)]
  private ?string $email = null;



  /**
   * @var string The hashed password
   */

  private ?string $plainPassword = null;

  #[ORM\Column(type: 'string')]
  #[Assert\Length(min: 8, max: 255)]
  private string $password;

  

  #[ORM\Column(type: 'json')]
  #[Assert\NotNull(message: 'Veuillez choisir au moins un rôle')]
  private array $roles = ['ROLE_USER', 'ROLE_ADMIN'];

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

  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  public function setLastName(string $lastName): static
  {
    $this->lastName = $lastName;

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
    $roles[] = 'ROLE_USER';

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

  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): static
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * Get the value of plainPassword
   *
   * @return ?string
   */
  public function getPlainPassword(): ?string
  {
    return $this->plainPassword;
  }

  /**
   * Set the value of plainPassword
   *
   * @param ?string $plainPassword
   *
   * @return self
   */
  public function setPlainPassword(?string $plainPassword): self
  {
    $this->plainPassword = $plainPassword;

    return $this;
  }
}
