<?php

namespace App\DataFixtures;

use App\Entity\Cities;
use App\Entity\Contracts;
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
        foreach(["CDI","CDD","Alternance","Stage","Freelance","Temps partiel"] as $contractname){
            $contract = new Contracts();
            $contract->setContractName($contractname);
            $manager->persist($contract);
        }

        $manager->flush();
    }
}
