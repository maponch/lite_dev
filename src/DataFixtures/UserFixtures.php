<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\User;

use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private object $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        //création de 10 propriétaires
        for($i = 1; $i <= 10; $i++) {
            $user = new User();

            $name = $faker->name;
            $lastName = $faker->lastName;
            $username = strtolower(substr($name, 0, 2)) . '.' . strtolower($lastName);

            $user->setName($name)
                ->setLastName($lastName)
                ->setMail($faker->email)
                ->setAdress($faker->address)
                ->setPhone($faker->phoneNumber)
                ->setCreatedAt(new \DateTimeImmutable())
                ->setRole('ROLE_OWNER')
                ->setPassword($this->hasher->hashPassword($user, 'password'))
                ->setUsername($username);

            $manager->persist($user);

        }
        $manager->flush();

        //Création Admin
        $user = new User();
        $user->setName('Big')
            ->setLastName('Boss')
            ->setMail('big@boss.test')
            ->setPhone('0123456789')
            ->setRole('ROLE_ADMIN')
            ->setAdress('Rue des pieds 2, Chaussette 2000')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setPassword($this->hasher->hashPassword($user, 'password'))
            ->setUsername('big.boss');

        $manager->persist($user);
        $manager->flush();
    }

}
