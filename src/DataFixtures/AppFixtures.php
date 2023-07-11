<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private $faker;
    
    public function load(ObjectManager $manager): void
    {
        // Users
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setLastName($this->faker->lastName());
            $user->setFirstName($this->faker->firstName());
            $user->setEmail($this->faker->email());
            $user->setPassword('password');
            $user->setRoles([]);
            $user->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
