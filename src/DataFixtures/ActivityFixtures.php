<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Activity;

class ActivityFixtures extends Fixture
{
    private array $activities = [
        "Gardening" => "Gardening involves designing, maintaining, and beautifying green spaces such as gardens, parks, or terraces. This includes planting vegetation, pruning, weeding, and soil maintenance. It contributes to biodiversity and quality of life by providing pleasant and functional environments. It’s an ideal field for nature and ecology enthusiasts.",
        "Roofing"   => "The roofing sector focuses on the construction, maintenance, and renovation of roofs. This includes installing tiles, slates, or insulation materials to ensure buildings are watertight and durable. Roofers also repair leaks or install water collection systems. This profession combines precision and technical expertise to protect homes.",
        "Plumbing"  => "Plumbing is essential for managing water and gas systems. Plumbers install, repair, and maintain pipelines, sanitary systems, and heating systems. They handle leaks, breakdowns, or renovations to ensure user comfort and safety. This job requires technical expertise and quick response skills.",
        "Electricity"=> "The electricity sector covers the installation, maintenance, and repair of electrical systems. Electricians work on residential, commercial, and industrial buildings to set up wiring, electrical panels, and lighting systems. With the rise of renewable energy and smart home technologies, this field is constantly evolving and demands great precision.",
        "Cleaning"  => "Cleaning is a crucial sector for maintaining cleanliness and hygiene in private and professional spaces. It includes cleaning offices, homes, windows, or industrial surfaces. Professionals use specialized equipment and follow strict protocols to ensure a healthy and pleasant environment. It’s a demanding and versatile job."
    ];
    public function load(ObjectManager $manager): void
    {
        foreach($this->activities as $activity=>$key) {
            $act = new Activity();
            $act->setName($activity)
                ->setDescription($key);

            $manager->persist($act);
        }

        $manager->flush();
    }
}
