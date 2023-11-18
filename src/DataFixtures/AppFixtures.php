<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
  /**
   * @var Generator
   */
  private Generator $faker;
  private UserPasswordHasherInterface $hasher;

  public function __construct(UserPasswordHasherInterface $hasher)
  {
    $this->faker = Factory::create('fr_FR');
    $this->hasher = $hasher;
  }

  public function load(ObjectManager $manager): void
  {
    // Users
    $admin = new User();
    $admin
      ->setLastName("Parrot")
      ->setFirstName("Vincent")
      ->setEmail("vincent.parrot@gmail.com")
      ->setPassword($this->hasher->hashPassword($admin, 'password12345'))
      ->setRoles(['ROLE_ADMIN'])
      ->setCreatedAt(new \DateTimeImmutable());
    $manager->persist($admin);

    $greg = new User();
    $greg
      ->setLastName("Tahir")
      ->setFirstName("Gregory")
      ->setEmail("tahir.gregory@gmail.com")
      ->setPassword($this->hasher->hashPassword($greg, 'password'))
      ->setRoles(['ROLE_USER'])
      ->setCreatedAt(new \DateTimeImmutable());
    $manager->persist($greg);

    for ($i = 0; $i < 10; $i++) {
      $user = new User();
      $user->setLastName($this->faker->lastName($this->faker->name()))
        ->setFirstName($this->faker->firstName())
        ->setEmail($this->faker->email())
        ->setPassword($this->hasher->hashPassword($user, 'password'))
        ->setRoles(['ROLE_USER'])
        ->setCreatedAt(new \DateTimeImmutable());
      $manager->persist($user);
    }
    $manager->flush();
  }
}
