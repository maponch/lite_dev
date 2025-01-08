<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Supplier;
use App\Entity\Activity;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class SupplierFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $activities = $manager->getRepository(Activity::class)->findAll();
        $faker = Factory::create();
        for($i = 0; $i <= 5; $i++) {
            $supplier = new Supplier();
            $supplier->setName('Company 0'. $i)
                    ->setMail($faker->email)
                    ->setPhone($faker->phoneNumber)
                    ->setTVA($faker->numerify('0000000009'))
                    ->setAddress($faker->address)
                    ->addActivityId($faker->randomElement($activities));
            $manager->persist($supplier);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            ActivityFixtures::class,
        ];
    }
}
