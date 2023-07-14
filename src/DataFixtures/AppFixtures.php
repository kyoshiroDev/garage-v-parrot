<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
  /**
   * @var Generator
   */
  private Generator $faker;

  public function __construct()
  {
    $this->faker = Factory::create('fr_FR');
  }

  public function load(ObjectManager $manager): void
  {
    // Users
    for ($i = 0; $i < 10; $i++) {
      $user = new User();
      $user->setLastName($this->faker->lastName($this->faker->name()))
        ->setFirstName($this->faker->firstName())
        ->setEmail($this->faker->email())
        ->setPassword('password')
        ->setRoles(['ROLE_USER'])
        ->setCreatedAt(new \DateTimeImmutable())
        ->setPlainPassword('password');
        
      $manager->persist($user);
    }

    $manager->flush();
  }
}
