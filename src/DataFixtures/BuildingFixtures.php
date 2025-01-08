<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Building;
use App\Entity\User;
use App\Entity\Supplier;

use Faker\Factory;

class BuildingFixtures extends Fixture implements DependentFixtureInterface
{
    private array $buildingName = ["Aigremoine", "Hêtre", "Pommier", "Mélèze", "Verveine"];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        foreach ($this->buildingName as $name) {
            $supplier = $manager->getRepository(Supplier::class)->findAll();
            $randSupplier = $supplier[array_rand($supplier)];
            $admin = $manager->getRepository(User::class)->findBy([
                'role' => ["ROLE_ADMIN"]
            ]);
            $randAdmin = $admin[array_rand($admin)];

            $building = new Building();
            $building ->setName($name)
                    ->setAddress($faker->streetAddress)
                    ->setFloor(rand(0 , 3))
                    ->setMunicipalities($faker->city)
                    ->setNumberOfLot(rand(4,12))
                    ->setPostalCode(rand(1000, 9999))
                    ->setSupplier($randSupplier->getId())
                    ->setAdministrator($randAdmin->getId())
                    ->addSupplierId($faker->randomElement($supplier))
                    ->addAdministator($faker->randomElement($admin));

            $manager->persist($building);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            SupplierFixtures::class,
            UserFixtures::class
        ];
    }
}
