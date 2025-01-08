<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Supplier;

use Faker\Factory;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 0; $i <= 5; $i++) {
            $supplier = new Supplier();
            $supplier->setName('Company 0'. $i)
                    ->setMail($faker->email)
                    ->setPhone($faker->phoneNumber)
                    ->setTVA($faker->numerify('0000000009'))
                    ->setAddress($faker->address);
            $manager->persist($supplier);
        }
        $manager->flush();
    }
}
