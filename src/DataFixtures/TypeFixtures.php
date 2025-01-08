<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Type;


class TypeFixtures extends Fixture
{
    private array $types = ["garage", "apartment", "studio", "attic"];

    public function load(ObjectManager $manager): void
    {
        foreach ($this->types as $type)  {
            $typeOfProprety = new Type();
            $typeOfProprety->setName($type);

            $manager->persist($typeOfProprety);
        }

        $manager->flush();
    }
}
