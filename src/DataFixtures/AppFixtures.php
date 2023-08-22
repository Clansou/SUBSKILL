<?php

namespace App\DataFixtures;

use App\Entity\Cities;
use App\Entity\Jobs;
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
        foreach(["CDI","CDD","Alternance","Stage","Freelance","Temps partiel"] as $jobsname){
            $jobs = new Jobs();
            $jobs->setJobName($jobsname);
            $manager->persist($jobs);
        }

        $manager->flush();
    }
}
