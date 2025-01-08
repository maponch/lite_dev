<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Proprety;
use App\Entity\Type;
use App\Entity\User;
use App\Entity\Building;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
class PropretyFixtures extends Fixture implements DependentFixtureInterface
{
    private $occupation = ["Empty", "Rental", "Occupied"];

    public function load(ObjectManager $manager): void
    {
        $buildings = $manager->getRepository(Building::class)->findAll();
        $type = $manager->getRepository(Type::class)->findOneBy([
            "name" => 'apartment'
        ]);
        $users = $manager->getRepository(User::class)->findAll();
        foreach ($buildings as $building) {
            for($i = 1; $i <= 4; $i++){
                $proprety = new Proprety();
                $randomOccupation = $this->occupation[array_rand($this->occupation)];
                $proprety->setTenant($randomOccupation)
                    ->setType($type)
                    ->setAddress($building->getAddress());
                $manager->persist($proprety);

            }
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            BuildingFixtures::class,
            TypeFixtures::class
        ];
    }
}
