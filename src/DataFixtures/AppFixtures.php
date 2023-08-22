<?php

namespace App\DataFixtures;

use App\Entity\Cities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        foreach(["Paris","Lyon","Lille","Marseille","Dijon"] as $name){
            $city = new Cities();
            $city->setCityName($name);
            $manager->persist($city);
        }

        $manager->flush();
    }
}
